<?php namespace App\Oleyh\Models;

class Booking extends BaseModel
{
    protected $fillable = ['player_id', 'start_at', 'end_at'];

    protected $validationRules = [
        'save' => [
            'player_id' => 'required|exists:players,id',
            'start_at' => 'required|date_format:Y-m-d H:i:s',
            'end_at' => 'required|date_format:Y-m-d H:i:s',
        ],
    ];

    protected $validationMessages = [
        'player_id.required' => 'MISSING_PLAYER_ID',
        'player_id.exists' => 'INVALID_PLAYER_ID',
        'start_at.required' => 'MISSING_START_AT',
        'start_at.date_format' => 'INVALID_START_AT',
        'end_at.required' => 'MISSING_END_AT',
        'end_at.date_format' => 'INVALID_END_AT',
    ];
}
