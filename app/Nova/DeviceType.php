<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;

class DeviceType extends Resource
{
    /** @var string $model */
    public static $model = 'App\Models\DeviceType';

    /** @var string $title */
    public static $title = 'name';

    /** @var array $search */
    public static $search = [
        'id',
        'name',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('name'),
        ];
    }
}
