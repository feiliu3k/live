<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'usercomment';
    protected $primaryKey='cid';
    protected $dates = ['ctime'];
    public $timestamps = false;

    public function webLive()
    {
        return $this->belongsTo('App\Models\WebLive','liveid','liveid');
    }
