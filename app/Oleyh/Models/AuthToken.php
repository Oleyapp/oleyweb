<?php namespace App\Oleyh\Models;

class AuthToken extends BaseModel
{
    public function player()
    {
        return $this->belongsTo('App\Oleyh\Models\Player', 'player_id');
    }

    public static function generate($player_id)
    {
        $token = new self();
        $token->player_id = $player_id;
        $token->token = str_random(48);
        $token->save();
        return $token;
    }
}
