<?php

namespace App\Services\Front;

use App\Models\Property;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

/**
 * Schowek odwiedzajacego — lokale odlozone do porownania.
 *
 * Zawartosc siedzi w sesji (klucz `clipboard.items`, ten sam co dotad, zeby
 * schowki otwarte u odwiedzajacych nie wyparowaly), nic nie trafia do bazy:
 * to notatnik goscia, a nie rezerwacja.
 *
 * Rozwiazanie przeniesione z instalacji "poligonowa" i dostosowane do tego
 * modelu danych — tu nie ma powierzchni dobieranych na karcie lokalu ani
 * skladnikow ceny, wiec suma to sama cena lokalu.
 */
class ClipboardService
{
    private const ITEMS = 'clipboard.items';

    /** Ile lokali mozna odlozyc — porownywarka z trzydziestoma kolumnami jest bezuzyteczna. */
    public const LIMIT = 8;

    /** @return array<int, int> */
    public function ids(): array
    {
        return array_values(array_unique(array_map('intval', (array) Session::get(self::ITEMS, []))));
    }

    public function count(): int
    {
        return count($this->ids());
    }

    public function has(int $propertyId): bool
    {
        return in_array($propertyId, $this->ids(), true);
    }

    public function isFull(): bool
    {
        return $this->count() >= self::LIMIT;
    }

    public function add(int $propertyId): bool
    {
        if ($this->has($propertyId)) {
            return true;
        }

        if ($this->isFull()) {
            return false;
        }

        Session::put(self::ITEMS, [...$this->ids(), $propertyId]);

        return true;
    }

    public function remove(int $propertyId): void
    {
        Session::put(self::ITEMS, array_values(array_diff($this->ids(), [$propertyId])));
    }

    public function clear(): void
    {
        Session::forget(self::ITEMS);
    }

    /**
     * Lokale ze schowka w kolejnosci odkladania, z doczytanymi relacjami.
     *
     * Lokal skasowany w panelu wypada z listy i znika z sesji — inaczej schowek
     * wracalby do niego przy kazdym wejsciu, a licznik w naglowku pokazywalby
     * wiecej pozycji, niz widac na stronie.
     */
    public function properties(): Collection
    {
        $ids = $this->ids();

        if ($ids === []) {
            return collect();
        }

        $found = Property::with(['investment:id,name,slug', 'floor:id,number', 'building:id,name'])
            ->whereIn('id', $ids)
            ->get()
            ->keyBy('id');

        $ordered = collect($ids)->map(fn($id) => $found->get($id))->filter()->values();

        if ($ordered->count() !== count($ids)) {
            Session::put(self::ITEMS, $ordered->pluck('id')->all());
        }

        return $ordered;
    }

    /** Cena, ktora klient ma w glowie: promocyjna, jesli jest, inaczej katalogowa. */
    public function price(Property $property): ?float
    {
        if ($property->highlighted && $property->promotion_price) {
            return (float) $property->promotion_price;
        }

        return $property->price_brutto ? (float) $property->price_brutto : null;
    }
}
