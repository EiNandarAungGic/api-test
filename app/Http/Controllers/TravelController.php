<?php

namespace App\Http\Controllers;

use App\Http\Resources\TravelResource;
use App\Models\Travel;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::where('is_public', true)->paginate();

        return TravelResource::collection($travels);
    }
}
