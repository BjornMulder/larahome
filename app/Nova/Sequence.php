<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Http\Requests\NovaRequest;

class Sequence extends Resource
{
    /** @var string $model */
    public static $model = 'App\Models\Sequence';

    /** @var string $title */
    public static $title = 'name';

    /** @var array $search */
    public static $search = [
        'id',
        'name',
        'description',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('name'),
            Markdown::make('description'),
        ];
    }
}
