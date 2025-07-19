<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['board_size', 'status'];

    public function players()
    {
        return $this->hasMany(GamePlayer::class);
    }
}
