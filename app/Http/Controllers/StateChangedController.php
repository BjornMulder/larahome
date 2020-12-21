<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;

class StateChangedController extends Controller
{

    public function __invoke(Request $request)
    {
	    $eventData = json_decode($request->getContent());
	    dd($eventData);


	    Entity::where('entity_id', $eventData->entity_id)->update([
		    'attributes' => json_encode($eventData->attributes),
		    'context' => json_encode($eventData->context),
		    'state' => $eventData->state,
	    ]);
    }

}
