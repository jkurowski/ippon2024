<?php

namespace App\Providers;

use App\Models\City;
use App\Models\InvestmentArticles;
use App\Models\InvestmentPage;
use App\Models\News;
use App\Models\Rent;
use App\Observers\CityObserver;
use App\Observers\InvestmentArticleObserver;
use App\Observers\InvestmentPageObserver;
use App\Observers\NewsObserver;
use App\Observers\RentObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Request;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

use App\Models\Investment;
use App\Observers\InvestmentObserver;

use App\Models\Url;
use App\Observers\UrlObserver;

use App\Models\Page;
use App\Observers\PageObserver;

use App\Models\Boxes;
use App\Observers\BoxObserver;

use App\Models\Gallery;
use App\Observers\GalleryObserver;

use App\Models\Image;
use App\Observers\ImageObserver;

use App\Models\Article;
use App\Observers\ArticleObserver;

use App\Models\RodoClient;
use App\Observers\RodoClientObserver;

use App\Models\Slider;
use App\Observers\SliderObserver;

use App\Models\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Settings::class, function () {
            return Settings::make(storage_path('app/settings.json'));
        });
        $this->app->bind('App\Repositories\EloquentRepositoryInterface', 'App\Repositories\BaseRepository');
        $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepository');
        $this->app->bind('App\Repositories\SliderRepositoryInterface', 'App\Repositories\SliderRepository');
        $this->app->bind('App\Repositories\BoxRepositoryInterface', 'App\Repositories\BoxRepository');
        $this->app->bind('App\Repositories\ArticleRepositoryInterface', 'App\Repositories\ArticleRepository');
        $this->app->bind('App\Repositories\PageRepositoryInterface', 'App\Repositories\PageRepository');
        $this->app->bind('App\Repositories\UrlRepositoryInterface', 'App\Repositories\UrlRepository');
        $this->app->bind('App\Repositories\ImageRepositoryInterface', 'App\Repositories\ImageRepository');
        $this->app->bind('App\Repositories\InvestmentRepositoryInterface', 'App\Repositories\InvestmentRepository');
        $this->app->bind('App\Repositories\SectionRepositoryInterface', 'App\Repositories\SectionRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Activity::saving(function (Activity $activity) {

            $activity->properties = collect([
                    "route"         => Request::getPathInfo(),
                    "ipAddress"     => Request::ip(),
                    "userAgent"     => Request::header('user-agent'),
                    "locale"        => Request::header('accept-language'),
                    "referer"       => Request::header('referer'),
                    "methodType"    => Request::method()
            ]);
        });

        view()->composer('*', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
            $view->with('cities', City::orderBy('sort', 'ASC')->get());

            $currentRoute = Route::current();
            $view->with('currentRoute', $currentRoute);

            $items = session('clipboard.items') ?? []; // Use the null coalescing operator to provide a default empty array if $items is null
            $itemCount = count($items);
            $view->with('itemCount', $itemCount);
        });

        Blade::directive('money', function ($amount) {
            return "<?php
        if (empty($amount)) {
            echo '';
        } else {
            \$amount = (float) $amount;
            if (intval(\$amount) == \$amount) {
                echo number_format(\$amount, 0, '.', ' ') . ' zł';
            } else {
                echo number_format(\$amount, 2, '.', ' ') . ' zł';
            }
        }
    ?>";
        });

        Image::observe(ImageObserver::class);
        Gallery::observe(GalleryObserver::class);
        Article::observe(ArticleObserver::class);
        News::observe(NewsObserver::class);
        RodoClient::observe(RodoClientObserver::class);
        Slider::observe(SliderObserver::class);
        Boxes::observe(BoxObserver::class);
        Article::observe(ArticleObserver::class);
        Page::observe(PageObserver::class);
        Url::observe(UrlObserver::class);
        Image::observe(ImageObserver::class);
        Investment::observe(InvestmentObserver::class);
        InvestmentPage::observe(InvestmentPageObserver::class);
        InvestmentArticles::observe(InvestmentArticleObserver::class);
        City::observe(CityObserver::class);
        Rent::observe(RentObserver::class);
    }
}
