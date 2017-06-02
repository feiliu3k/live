<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebLive extends Model
{
    protected $table = 'weblive';
    protected $primaryKey='liveid';
    public $timestamps = false;
   // protected $dates = ['livetime'];

    protected $fillable = [
        'livetitle', 'livetime', 'liveimg', 'livecontent', 'pnum', 'readnum', 'hlsurl', 'rtmpurl', 'commentflag', 'refreshcommentflag', 'hlsurl1', 'verifyflag', 'delflag', 'refreshliveflag', 'countdownflag', 'adname', 'adlinkadimg', 'uistyle', 'livelistorder', 'realreadnum', 'showreadflag','proname'
    ];

    public function webInfos()
    {
        return $this->hasMany('App\Models\WebInfo','liveid','liveid')->orderby('ifotime','desc');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment','liveid','liveid')->orderby('ctime','desc');
    }

    public function viewRecords()
    {
        return $this->hasMany('App\Models\ViewRecord','liveid','liveid');
    }

    public function visitors()
    {
        return $this->hasMany('App\Models\Visitor','liveid','liveid');
    }
}
