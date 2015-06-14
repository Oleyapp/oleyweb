<?php namespace App\Oleyh\Controllers\Api;

use App\Oleyh\Models\Booking;
use App\Oleyh\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingController extends BaseApiController
{
    use AuthenticatedPlayer;

    public function book(Request $req)
    {
        $in = $req->input();
        $player = $this->getPlayer();

        $book = new Booking($in);
        $book->player()->associate($player);
        
        if ($book->isValid()) {
            
            $ts = Booking::where('start_at', '<', $book->end_at)
                ->where('end_at', '>', $book->start_at)
                ->where('court_id', $book->court_id)
                ->count();

            if ($ts == 0) {
                $book->save();
                return new Response($book, 201);
            } else {
                return new Response([
                    'errors' => ['SLOT_NOT_AVAILABLE'],
                ], 422);
            }
        } else {
            return new Response([
                'errors' => $book->getErrors()->all(),
            ], 422);
        }
    }
}
