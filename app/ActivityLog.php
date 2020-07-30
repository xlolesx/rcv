<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = "activity_log";

    // protected $dateFormat = 'Y-m-d H:i:s.u04';

    public function admin(){
    	return $this->belongsTo('App\Admin', 'causer_id', 'id');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'causer_id', 'id')->withTrashed();
    }
}
