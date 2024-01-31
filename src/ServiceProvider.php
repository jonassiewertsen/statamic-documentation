<?php

namespace Jonassiewertsen\Documentation;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Jonassiewertsen\Documentation\Helper\Documentation;
use Statamic\Facades\Collection;
use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Statamic;

class ServiceProvider extends AddonServiceProvider
{
    protected $vite = [
        'input' => [
            'resources/css/cp.scss'
        ],
        'publicDirectory' => 'resources/dist',
    ];

    protected $routes = [
        'cp' => __DIR__ . '/routes/cp.php',
    ];

    // protected $publishAfterInstall = false;

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/documentation/'),
            ], 'documentation-lang');

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('documentation.php'),
            ], 'documentation-config');

            // Blueprints
            $this->publishes([
                __DIR__ . '/../resources/blueprints' => resource_path('blueprints'),
            ], 'documentation-blueprints');

            // Collections
            $this->publishes([
                __DIR__ . '/../resources/collections' => base_path('content/collections'),
            ], 'documentation-collections');
        }

        // Only boot everything, if we detect a cp route.
        // Otherwise me might boot the navigation, which is not needed.
        $currentRoute = $this->app->request->getRequestUri();
        $cpRoute = '/'.config('statamic.cp.route').'/';

        if (! Str::startsWith($currentRoute, $cpRoute)) {
            return;
        }
        
        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'documentation');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'documentation');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'documentation');

        $this->createNavigation();
        $this->publishAssets();
    }

    private function publishAssets(): void
    {
        Statamic::afterInstalled(function () {
            Artisan::call('vendor:publish --tag=documentation-config');
            Artisan::call('vendor:publish --tag=documentation-blueprints');
            Artisan::call('vendor:publish --tag=documentation-collections');
        });
    }

    private function createNavigation(): void
    {
        Nav::extend(function ($nav) {

            if (Documentation::exists()) {
                Documentation::tree()->map(function ($tree) use ($nav) {
                    return $nav->create(Documentation::entryTitle($tree['entry']))
                               ->route('documentation.show', Documentation::entrySlug($tree['entry']))
                               ->icon('drawer-file')
                               ->section(__('documentation::general.documentation'))
                               ->children(Documentation::entryChildren($tree, $nav));
                });
            }

            // Only show the Manage button, if the permissions have been set
            if (Gate::allows('edit', Collection::findByHandle(Documentation::collectionName()))) {
                $nav->create(__('documentation::general.manage'))
                    ->icon('settings-slider')
                    ->section(__('documentation::general.documentation'))
                    ->route('collections.show', [
                        'collection' => Documentation::collectionName(),
                    ]);
            }
        });
    }
}
