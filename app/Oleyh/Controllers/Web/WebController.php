<?php namespace App\Oleyh\Controllers\Web;

use Auth;
use Illuminate\Http\Request;

class WebController extends BaseWebController
{
    public function index()
    {
        return view('web.start');
    }

    public function login()
    {
        return view('web.login');
    }

    public function performLogin(Request $req)
    {
        if (Auth::attempt($req->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->isCourtType()) {
                return redirect()->route('court.index');
            }
        } else {
            return redirect()
                ->back()
                ->with('message', 'Email or password is incorrect.');
        }
    }

    public function performLogout()
    {
        Auth::logout();
        return redirect()
            ->route('index');
    }

    public function generateHash($pass)
    {
        return \Hash::make($pass);
    }
}
