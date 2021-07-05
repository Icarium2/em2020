<?php

namespace App\Models;

use App\Models\Results;
use App\Models\Countries;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'passwordReal',
        'active'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function game()
    {
        return $this->hasOneThrough(userPredictions::class, Games::class, 'id', 'game_id')->orderBy('game_id', 'ASC');
    }

}
