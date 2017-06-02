<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitor';
    protected $primaryKey='id';
    protected $dates = ['visittime'];
    public $timestamps = false;

    protected $fillable = [
        'liveid', 'uid', 'nickname', 'mobile', 'useravatar', 'localrecord', 'userip', 'visittime', 'visitorsex', 'city',  'openid',  'visitorfrom', 'unionid' 
    ];

    public function webLive()
    {
        return $this->belongsTo('App\Models\WebLive','liveid','liveid');
    }
}
