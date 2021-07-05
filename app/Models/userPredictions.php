<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPredictions extends Model
{
    use HasFactory;

    protected $fillable = ['game_id', 'user_id', 'homeScore', 'awayScore'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function game()
    {
        return $this->belongsTo(Games::class, 'game_id', 'id');
    }
}
