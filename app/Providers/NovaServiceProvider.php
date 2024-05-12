<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('chart-bar'),

                MenuSection::make('References', [                    
                    MenuItem::make('Organisation Types', 'resources/ref-organisation-types'),
                    MenuItem::make('Employee Types', 'resources/ref-employee-types'),
                    MenuItem::make('Customer Types', 'resources/ref-customer-types'),
                    MenuItem::make('Leave Types', 'resources/ref-leave-types'),
                    MenuItem::make('Event Types', 'resources/ref-event-types'),
                    MenuItem::make('Payment Method', 'resources/ref-payment-methods'),
                ])->icon('collection')->collapsable(),

                MenuSection::make('Organisations', [
                    MenuItem::make('Organisations', 'resources/organisations'),
                    MenuItem::make('People', 'resources/people'),
                    MenuItem::make('Addresses', 'resources/addresses'),
                    MenuItem::make('Building', 'resources/buildings'),
                    MenuItem::make('Floors', 'resources/floors'),
                    MenuItem::make('Wards', 'resources/wards'), 
                    MenuItem::make('Rooms', 'resources/rooms'),    
                    MenuItem::make('Beds', 'resources/beds'),                
                ])->icon('collection')->collapsable(),

                MenuSection::make('Employees', [
                    MenuItem::make('Employees', 'resources/employees'),
                ])->icon('collection')->collapsable(),

                MenuSection::make('Customers', [
                    MenuItem::make('Customers', 'resources/customers'),
                ])->icon('collection')->collapsable(),

                MenuSection::make('Projects', [
                    MenuItem::make('Projects', 'resources/projects'),
                ])->icon('collection')->collapsable(),

                MenuSection::make('Users', [
                    MenuItem::make('Users', 'resources/users'),
                    MenuItem::make('Permissions', 'resources/permissions'),
                    MenuItem::make('Roles', 'resources/roles'),
                ])->icon('collection')->collapsable(),
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
