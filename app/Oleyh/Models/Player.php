<?php namespace App\Oleyh\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Player extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    protected $validationRules = [
        'save' => [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ],
        'create' => [
            'email' => 'required|email|unique:players',
        ],
    ];

    protected $validationMessages = [
        'name.required' => 'MISSING_NAME',
        'email.required' => 'MISSING_EMAIL',
        'email.email' => 'INVALID_EMAIL',
        'email.unique' => 'EXISTING_EMAIL',
        'password.required' => 'MISSING_PASSWORD',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }
}
