<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewRecord extends Model
{
    protected $table = 'viewrecord';
    protected $primaryKey='id';
    protected $dates = ['viewtime'];
    public $timestamps = false;

    protected $fillable = [
        'liveid', 'localrecord', 'userip', 'userphone', 'viewtime'
    ];

    public function webLive()
    {
        return $this->belongsTo('App\Models\WebLive','liveid','liveid');
    }
}
