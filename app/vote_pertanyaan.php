<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pertanyaan;
use Auth;

class vote_pertanyaan extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne('Auth', 'user_id');
    }

    public function vote()
    {
        return $this->hasOne('App\vote_pertanyaan');
    }
}
