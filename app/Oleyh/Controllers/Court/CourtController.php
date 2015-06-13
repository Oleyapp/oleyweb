<?php namespace App\Oleyh\Controllers\Court;

use App\Oleyh\Models\Court;

class CourtController extends BaseCourtController
{
    public function index()
    {
        return view('court.index')
            ->with('court', $this->court);
    }
}
