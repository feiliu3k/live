<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'usercomment';
    protected $primaryKey='ucid';
    protected $dates = ['ctime'];
    public $timestamps = false;

    public function webLive()
    {
        return $this->belongsTo('App\Models\WebLive','liveid','liveid');
    }

    public function getUpimgAttribute($value)
    {
        $imgs=[];
        if (strlen(trim($value))>0){
            $imgs=explode(',',substr(trim($value),0,-1));
        }
        return $imgs;
    }

}
