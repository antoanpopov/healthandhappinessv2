<?php

namespace Modules\Health\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Health\Console\DatabaseSetupCommand;
use Modules\Health\Entities;
use Modules\Health\Repositories;
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
        $this->app->make(\Illuminate\Database\Eloquent\Factory::class)->load(__DIR__ . '/../Database/Factories');

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

        if ($this->app->runningInConsole()) {
            $this->commands([
                DatabaseSetupCommand::class,
            ]);
        }
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
        $this->app->bind(Repositories\CategoryRepository::class, function () {
            $repository = new Repositories\Eloquent\EloquentCategoryRepository(new Entities\Category());

            if (!config('app.cache')) {
                return $repository;
            }

            return new Repositories\Cache\CacheCategoryDecorator($repository);
        });

        $this->app->bind(Repositories\PostRepository::class, function () {
            $repository = new Repositories\Eloquent\EloquentPostRepository(new Entities\Post());

            if (!config('app.cache')) {
                return $repository;
            }

            return new Repositories\Cache\CachePostDecorator($repository);
        });

        $this->app->bind(Repositories\AuthorRepository::class, function () {
            $repository = new Repositories\Eloquent\EloquentAuthorRepository(new Entities\Author());

            if (!config('app.cache')) {
                return $repository;
            }

            return new Repositories\Cache\CacheAuthorDecorator($repository);
        });
    }

    protected function registerBladeTags()
    {
        if (app()->environment() === 'testing') {
            return;
        }
    }
}
