<?php

namespace App\Console\Commands;

use App\Models\Slider;
use App\Services\SliderService;
use Illuminate\Console\Command;

/**
 * Slajdy wgrane przed wprowadzeniem serii rozmiarow maja tylko jeden plik.
 * Ta komenda dorabia im reszte kadrow bez wchodzenia do admina i wgrywania
 * wszystkiego od nowa. Puszczaj tez po zmianie rozmiarow w config/images.php.
 */
class SliderRegenerate extends Command
{
    protected $signature = 'slider:regenerate {--id= : przegeneruj tylko ten slajd}';

    protected $description = 'Generuje serie rozmiarow (1920/1440/1024, mobile, miniaturka) dla slajdow hero';

    public function handle(SliderService $service): int
    {
        $sliders = $this->option('id')
            ? Slider::where('id', $this->option('id'))->get()
            : Slider::orderBy('sort')->get();

        if ($sliders->isEmpty()) {
            $this->warn('Nie ma czego przegenerowac.');
            return self::SUCCESS;
        }

        $done = 0;

        foreach ($sliders as $slider) {
            if ($service->regenerate($slider)) {
                $this->info(sprintf('OK   #%d %s (%s)', $slider->id, $slider->title, $slider->file));
                $done++;
                continue;
            }

            $this->error(sprintf('BRAK #%d %s — nie znalazlem pliku zrodlowego', $slider->id, $slider->title));
        }

        $this->line(sprintf('Przegenerowano %d z %d slajdow.', $done, $sliders->count()));

        return self::SUCCESS;
    }
}
