<?php

namespace Jonassiewertsen\Documentation;

use Illuminate\Support\Facades\Gate;
use Jonassiewertsen\Statamic\HowTo\Commands\Setup;
use Jonassiewertsen\Statamic\HowTo\Helper\Documentation;
use Jonassiewertsen\Statamic\HowTo\Helper\Video;
use Statamic\Facades\Collection;
use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__ . '/routes/cp.php',
    ];

    protected $commands = [
        Setup::class,
    ];

    protected $widgets = [];

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'documentation');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'documentation');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'documentation');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/documentation/'),
            ], 'Documentation Addon lang file');

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('documentation.php'),
            ], 'Documentation Addon config file');
        }

        $this->createNavigation();
    }

    private function createNavigation(): void
    {
        Nav::extend(function ($nav) {

            if (Documentation::exists()) {
                Documentation::tree()->map(function ($tree) use ($nav) {
                    return $nav->create(Documentation::entryTitle($tree['entry']))
                               ->route('documentation.documentation.show', Documentation::entrySlug($tree['entry']))
                               ->icon('drawer-file')
                               ->section('Documentation')
                               ->children(Documentation::entryChildren($tree, $nav));
                });
            }

            // Only show the Manage button, if the permissions have been set
            if (Gate::allows('edit', Collection::findByHandle(Documentation::collectionName()))) {
                $nav->create(__('documentation::menu.manage'))
                    ->icon('settings-slider')
                    ->section('Documentation')
                    ->route('collections.show', [
                        'collection' => Documentation::collectionName(),
                    ]);
            }
        });
    }

    private function loadCommands(array $commands)
    {
        if ($this->app->runningInConsole()) {
            $this->commands($commands);
        }
    }
}
