<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Services\NewsService;
use Illuminate\Console\Command;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Hurtowe podpiecie grafik aktualnosci (paczka od klienta, 1200x1600) pod wpisy.
 * Mapowanie "id wpisu;nazwa pliku" w CSV (np. database/data/2026_11_05_aktualnosci_grafiki.csv),
 * pliki w katalogu --dir. Kazda grafika idzie przez NewsService::upload, czyli tak samo jak
 * z panelu: oryginal, kadry, WebP i kafel 3:4.
 *
 * Stare pliki NIE sa kasowane - komenda wypisuje poprzednia nazwe, wiec cofniecie to
 * przywrocenie pola news.file / news.file_webp.
 *
 *   php artisan news:import-graphics database/data/2026_11_05_aktualnosci_grafiki.csv --dir="E:\...\aktualnosci" --dry-run
 */
class NewsImportGraphics extends Command
{
    protected $signature = 'news:import-graphics
        {map : CSV ze srednikiem: id;plik (pierwszy wiersz = naglowek)}
        {--dir= : katalog z grafikami}
        {--dry-run : tylko sprawdz mapowanie, nic nie zapisuj}';

    protected $description = 'Podpina grafiki aktualnosci z paczki klienta wg mapowania id -> plik';

    public function handle(NewsService $service): int
    {
        $map = base_path($this->argument('map'));
        $map = File::isFile($map) ? $map : $this->argument('map');
        $dir = rtrim((string) $this->option('dir'), '\\/');

        if (! File::isFile($map) || ! File::isDirectory($dir)) {
            $this->error('Brak pliku mapowania albo katalogu --dir.');
            return self::FAILURE;
        }

        $rows = array_map(fn ($line) => str_getcsv($line, ';'), file($map, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
        array_shift($rows);

        $tmpDir = storage_path('app/news-import');
        File::ensureDirectoryExists($tmpDir);
        $errors = 0;

        foreach ($rows as $row) {
            [$id, $fileName] = $row;
            $expected = $row[2] ?? null;
            $news = News::find((int) $id);
            $source = $dir . DIRECTORY_SEPARATOR . $fileName;

            if (! $news || ! File::isFile($source)) {
                $this->error(sprintf('BLAD #%s %s', $id, ! $news ? 'brak wpisu w bazie' : 'brak pliku ' . $fileName));
                $errors++;
                continue;
            }

            $title = $news->getTranslation('title', 'pl');

            // ID moga sie roznic miedzy bazami (lokalna, developro, produkcja) - pod innym ID inny wpis
            if ($expected !== null && trim($expected) !== trim($title)) {
                $this->error(sprintf('BLAD #%d tytul w bazie "%s" rozny od mapowania "%s" - pomijam', $news->id, $title, $expected));
                $errors++;
                continue;
            }

            if ($this->option('dry-run')) {
                $this->line(sprintf('OK   #%d %s  <-  %s', $news->id, $title, $fileName));
                continue;
            }

            // PNG z paczki maja po 1-4 MB i zero przezroczystosci - do JPG przed wgraniem
            $jpg = $tmpDir . DIRECTORY_SEPARATOR . 'news-' . $news->id . '.jpg';
            Image::make($source)->encode('jpg', 88)->save($jpg);

            $old = $news->file;
            $service->upload($title, new UploadedFile($jpg, basename($jpg), 'image/jpeg', null, true), $news);
            File::delete($jpg);

            $this->info(sprintf('OK   #%d %s  (bylo: %s)', $news->id, $news->fresh()->file, $old ?: '-'));
        }

        $this->line(sprintf('Wpisy: %d, bledy: %d.', count($rows), $errors));

        return $errors ? self::FAILURE : self::SUCCESS;
    }
}
