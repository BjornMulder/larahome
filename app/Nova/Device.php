<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;

class Device extends Resource
{
    /** @var string $model */
    public static $model = 'App\Models\Device';

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
