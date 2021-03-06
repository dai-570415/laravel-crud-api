<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $quarded = array('id');

    public function user() {
        return $this->belongsTo('App\User');
    }
}
