<?php

namespace Modules\Itask\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Itask\Listeners\RegisterItaskSidebar;

class ItaskServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterItaskSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            // append translations
        });


    }

    public function boot()
    {
       
        $this->publishConfig('itask', 'config');
        $this->publishConfig('itask', 'crud-fields');

        $this->mergeConfigFrom($this->getModuleConfigFilePath('itask', 'settings'), "asgard.itask.settings");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('itask', 'settings-fields'), "asgard.itask.settings-fields");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('itask', 'permissions'), "asgard.itask.permissions");

        //$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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
        $this->app->bind(
            'Modules\Itask\Repositories\TaskRepository',
            function () {
                $repository = new \Modules\Itask\Repositories\Eloquent\EloquentTaskRepository(new \Modules\Itask\Entities\Task());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itask\Repositories\Cache\CacheTaskDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Itask\Repositories\StatusRepository',
            function () {
                $repository = new \Modules\Itask\Repositories\Eloquent\EloquentStatusRepository(new \Modules\Itask\Entities\Status());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itask\Repositories\Cache\CacheStatusDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Itask\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Itask\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Itask\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itask\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Itask\Repositories\PriorityRepository',
            function () {
                $repository = new \Modules\Itask\Repositories\Eloquent\EloquentPriorityRepository(new \Modules\Itask\Entities\Priority());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itask\Repositories\Cache\CachePriorityDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Itask\Repositories\TimelogRepository',
            function () {
                $repository = new \Modules\Itask\Repositories\Eloquent\EloquentTimelogRepository(new \Modules\Itask\Entities\Timelog());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Itask\Repositories\Cache\CacheTimelogDecorator($repository);
            }
        );
// add bindings





    }


}
