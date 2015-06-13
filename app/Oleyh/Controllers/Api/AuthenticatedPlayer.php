<?php namespace App\Oleyh\Controllers\Api;

use App\Oleyh\Models\AuthToken;
use Auth;
use Request;

trait AuthenticatedPlayer
{
    public function getPlayer()
    {
        $token = AuthToken::check(Request::input('token'));
        return $token->player;
    }
}
