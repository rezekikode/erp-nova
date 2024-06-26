<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Organisation extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Organisation>
     */
    public static $model = \App\Models\Organisation::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'organisation_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Organisation Type', 'refOrganisationType', RefOrganisationType::class),            
            Text::make('Organisation Name'),
            Text::make('Email'),
            Text::make('Phone'),
            BelongsToMany::make('Address')
                ->fields(function ($request, $relatedModel) {
                    return [
                        Text::make('From Date'),
                    ];
                }),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the fields displayed by the resource on detail page.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    // public function fieldsForIndex(NovaRequest $request)
    // {
    //     return [
    //         ID::make()->sortable(),
    //         BelongsTo::make('Organisation Type', 'refOrganisationType', RefOrganisationType::class),            
    //         Text::make('Organisation Name'),
    //         Text::make('Email'),
    //         Text::make('Phone'),
    //         BelongsToMany::make('Address')
    //             ->fields(function ($request, $relatedModel) {
    //                 return [
    //                     Text::make('From Date'),
    //                 ];
    //             }),
    //     ];
    // }

    /**
     * Get the fields displayed by the resource on detail page.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fieldsForCreate(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Organisation Type', 'refOrganisationType', RefOrganisationType::class),            
            Text::make('Organisation Name'),
            Text::make('Email'),
            Text::make('Phone'),
            BelongsToMany::make('Address')
                ->fields(function ($request, $relatedModel) {
                    return [
                        Date::make('From Date'),
                    ];
                }),
        ];
    }

    /**
     * Get the fields displayed by the resource on detail page.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    // public function fieldsForUpdate(NovaRequest $request)
    // {
    //     return [
    //         ID::make()->sortable(),
    //         BelongsTo::make('Organisation Type', 'refOrganisationType', RefOrganisationType::class),            
    //         Text::make('Organisation Name'),
    //         Text::make('Email'),
    //         Text::make('Phone'),
    //         BelongsToMany::make('Address')
    //             ->fields(function ($request, $relatedModel) {
    //                 return [
    //                     Date::make('From Date'),
    //                 ];
    //             }),
    //     ];
    // }
}
