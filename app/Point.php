<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = [];

    public function apa()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
