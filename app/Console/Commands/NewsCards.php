<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Services\NewsService;
use Illuminate\Console\Command;

/**
 * Kafle 3:4 aktualnosci (config images.news_card) dla wpisow wgranych przed
 * 10.2026. Nowe i edytowane wpisy dostaja kafel z admina (NewsService::upload,
 * Admin\News\IndexController::update). Puszczaj tez po zmianie rozmiaru kafla.
 */
class NewsCards extends Command
{
    protected $signature = 'news:cards
        {--limit=5 : ile ostatnich wpisow (wg daty)}
        {--id= : tylko ten wpis}
        {--all : wszystkie wpisy}';

    protected $description = 'Generuje kafle 3:4 (uploads/news/card) dla aktualnosci';

    public function handle(NewsService $service): int
    {
        $query = News::whereNotNull('file')->orderBy('date', 'desc');

        if ($this->option('id')) {
            $query->where('id', $this->option('id'));
        } elseif (! $this->option('all')) {
            $query->take((int) $this->option('limit'));
        }

        $done = 0;

        foreach ($news = $query->get() as $item) {
            if ($service->makeCard($item)) {
                $this->info(sprintf('OK   #%d %s', $item->id, NewsService::cardPath($item)));
                $done++;
                continue;
            }

            $this->error(sprintf('BRAK #%d %s — nie znalazlem pliku zrodlowego', $item->id, $item->file));
        }

        $this->line(sprintf('Kafle: %d z %d wpisow.', $done, $news->count()));

        return self::SUCCESS;
    }
}
