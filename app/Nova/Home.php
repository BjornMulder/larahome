<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Home extends Resource
{
    /** @var string $model */
    public static $model = 'App\Models\Home';

    /** @var string $title */
    public static $title = 'name';

    /** @var array $search */
    public static $search = [
        'id',
        'name',
    ];

    /** @var bool $displayInNavigation */
    public static $displayInNavigation = false;

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('name'),
            Textarea::make('description'),
        ];
    }
}
