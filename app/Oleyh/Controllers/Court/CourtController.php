<?php namespace App\Oleyh\Controllers\Court;

use App\Oleyh\Models\Booking;
use App\Oleyh\Models\Court;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourtController extends BaseCourtController
{
    public function index()
    {
        return view('court.index')
            ->with('court', $this->court);
    }

    public function events(Request $req)
    {
        $start = $req->input('start');
        $end = $req->input('end');

        $bookings = CalendarBookingObject::where('start_at', '>=', $start)
            ->where('end_at', '<=', $end)
            ->get();

        return $bookings;
    }
}

class CalendarBookingObject extends Booking
{
    protected $table = 'bookings';
    protected $appends = ['title', 'start', 'end'];
    protected $hidden = ['start_at', 'end_at'];

    public function getTitleAttribute()
    {
        return $this->player->name . ' - #' . $this->id;
    }

    public function getStartAttribute()
    {
        return Carbon::parse($this->start_at)->toIso8601String();
    }

    public function getEndAttribute()
    {
        return Carbon::parse($this->end_at)->toIso8601String();
    }
}
