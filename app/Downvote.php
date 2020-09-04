<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pertanyaan;
use App\User;

class Downvote extends Model
{
    protected $guarded = [];

    public function downvote()
    {
        return $this->hasOne('App\Pertanyaan');
    }

    public function user()
    {
        return $this->hasOne('App\user');
    }
}
