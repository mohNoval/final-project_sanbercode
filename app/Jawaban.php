<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Jawaban extends Model
{
    //
    protected $guarded = [];

    public function penjawab()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo('App\Pertanyaan', 'pertanyaan_id');
    }
}
