<?php

namespace Modules\Health\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Health\Entities\Category;
use Modules\Health\Repositories\Cache\CacheCategoryDecorator;
use Modules\Health\Repositories\CategoryRepository;
use Modules\Health\Repositories\Eloquent\EloquentCategoryRepository;
use Modules\Health\Events\Handlers\RegisterHealthSidebar;

class HealthServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();

        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('health', RegisterHealthSidebar::class)
        );
    }

    public function boot()
    {
        $this->publishConfig('health', 'permissions');
        $this->publishConfig('health', 'config');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(CategoryRepository::class, function () {
            $repository = new EloquentCategoryRepository(new Category());

            if (!config('app.cache')) {
                return $repository;
            }

            return new CacheCategoryDecorator($repository);
        });
    }

    protected function registerBladeTags()
    {
        if (app()->environment() === 'testing') {
            return;
        }
    }
}
