<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    protected $fillable = ['judul', 'isi', 'user_id'];

    // protected $guarded = [];
    public function penanya()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'pertanyaan_tag', 'pertanyaan_id', 'tag_id');
    }
}
