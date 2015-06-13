<?php namespace App\Oleyh\Controllers\Court;

use App\Oleyh\Controllers\BaseController;
use Auth;

abstract class BaseCourtController extends BaseController
{
    public function __construct()
    {
        $this->user = Auth::user();
        $this->court = $this->user->court;
    }
}
