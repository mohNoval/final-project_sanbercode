<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\vote_pertanyaan;
use App\Downvote;

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

    public function vote()
    {
        return $this->hasOne('App\vote_pertanyaan');
    }

    public function downVote()
    {
        return $this->hasOne('App\Downvote');
    }
}
