<?php namespace App\Oleyh\Controllers\Api;

use App\Oleyh\Models\AuthToken;
use App\Oleyh\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlayerController extends BaseApiController
{
    public function register(Request $req)
    {
        $in = $req->input();
        $account = new Player($in);

        if ($account->isValid()) {
            $account->save();

            $token = AuthToken::generate($account->id);

            return new Response([
                'token' => $token->token,
                'account' => $account,
            ], 201);
        } else {
            return new Response([
                'errors' => $account->getErrors()->all(),
            ], 422);
        }
    }

    public function login(Request $req)
    {
        $in = $req->input();

        $account = Player::where('email', $req->input('email'))->first();

        if ($account && \Hash::check($req->input('password'), $account->password)) {
            $token = AuthToken::generate($account->id);
            return [
                'token' => $token->token,
                'account' => $account,
            ];
        } else {
            return new Response([
                'errors' => ['INVALID_EMAIL_OR_PASSWORD'],
            ], 401);
        }
    }
}
