<?php

namespace App\Http\Controllers\Api\Sync;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Mini API tylko do odczytu (19.11.2026) - pelne dane tresci strony (inwestycje,
 * budynki, pietra, mieszkania, ceny, galerie, kafle, slider...) do porownania
 * lokalnej bazy z produkcja przy wdrozeniach.
 *
 * Dostep: naglowek  X-Sync-Key: <klucz>  (klucz w .env: SYNC_API_KEY).
 * Bez klucza w .env, bez naglowka albo ze zlym kluczem -> 404, jakby trasy nie bylo.
 *
 *   GET /api/sync                      lista tabel: liczba wierszy, ostatnia zmiana
 *   GET /api/sync/{tabela}?page=1      wiersze tabeli po id, po 500 na strone
 *   GET /api/sync/{tabela}?id=5        jeden wiersz
 *
 * Wylacznie tabele z TABLES. Celowo poza lista: uzytkownicy, klienci i wiadomosci
 * z formularzy (clients, client_*), RODO, activity_log, notifications, uprawnienia.
 */
class IndexController extends Controller
{
    private const PER_PAGE = 500;

    private const TABLES = [
        'investments', 'investment_pages', 'investment_sections', 'investment_articles', 'investments_plans',
        'investment_companies', 'investment_sale_points',
        'buildings', 'floors', 'properties', 'property_property',
        'property_prices', 'property_price_components', 'property_price_component_property',
        'cities', 'boxes', 'sliders', 'galleries', 'images',
        'pages', 'sections', 'inlines', 'articles', 'news', 'faqs', 'awards', 'reviews',
        'commercials', 'rents', 'promotions', 'maps',
    ];

    public function index(Request $request): JsonResponse
    {
        $this->authorizeKey($request);

        $tables = [];
        foreach (self::TABLES as $table) {
            if (!Schema::hasTable($table)) {
                continue;
            }
            $tables[$table] = [
                'rows'       => DB::table($table)->count(),
                'updated_at' => Schema::hasColumn($table, 'updated_at') ? DB::table($table)->max('updated_at') : null,
            ];
        }

        return response()->json(['generated_at' => now()->toDateTimeString(), 'tables' => $tables]);
    }

    public function show(Request $request, string $table): JsonResponse
    {
        $this->authorizeKey($request);

        abort_unless(in_array($table, self::TABLES, true) && Schema::hasTable($table), 404);

        $query = DB::table($table);
        $hasId = Schema::hasColumn($table, 'id');

        if ($request->filled('id')) {
            abort_unless($hasId, 404);
            $row = $query->where('id', (int) $request->query('id'))->first();
            abort_unless($row, 404);

            return response()->json(['table' => $table, 'row' => $row]);
        }

        $page  = max(1, (int) $request->query('page', 1));
        $total = (clone $query)->count();
        $rows  = $query->when($hasId, fn ($q) => $q->orderBy('id'))
            ->forPage($page, self::PER_PAGE)
            ->get();

        return response()->json([
            'table'    => $table,
            'page'     => $page,
            'per_page' => self::PER_PAGE,
            'total'    => $total,
            'pages'    => (int) ceil($total / self::PER_PAGE),
            'rows'     => $rows,
        ]);
    }

    private function authorizeKey(Request $request): void
    {
        $key = (string) config('services.sync.key');
        $sent = (string) $request->header('X-Sync-Key');

        abort_if($key === '' || strlen($key) < 32 || !hash_equals($key, $sent), 404);
    }
}
