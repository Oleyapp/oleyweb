<?php namespace App\Oleyh\Controllers\Api;

use App\Oleyh\Models\Court;

class CourtController extends BaseApiController
{
    public function index()
    {
        $courts = Court::all();
        return response()
            ->json($courts);
    }
}
