<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban_tepat extends Model
{
    protected $guarded = [];

    public function tepat()
    {
        return $this->belongsTo('App\Pertanyaan', 'pertanyaan_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
