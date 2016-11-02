<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebInfo extends Model
{
    protected $table = 'webifo';
    protected $primaryKey='ifoid';
    protected $dates = ['ifotime'];
    public $timestamps = false;

    protected $fillable = [
        'liveid', 'ifotitle', 'ifocontent', 'ifotime', 'delflag'
    ];

    protected $casts = ['delflag'];

    public function webLive()
    {
        return $this->belongsTo('App\Models\WebLive','liveid','liveid');
    }

    public function getPublishTimeAttribute($value)
    {
        return $this->ifotime->format('H:i');
    }

    /**
     * Return the date portion of published_at
     */
    public function getPublishDateAttribute($value)
    {
        return $this->ifotime->format('Y-m-d');
    }


}
