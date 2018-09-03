<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;

class Action extends Resource
{
    /** @var string $model */
    public static $model = 'App\Models\Action';

    /** @var string $title */
    public static $title = 'name';

    /** @var array $search */
    public static $search = [
        'id',
        'name',
        'action',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
        ];
    }
}
