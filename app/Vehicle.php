<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;


class Vehicle extends Model
{
	use SoftDeletes, LogsActivity;

    protected static $logName = "Vehiculo";

    protected static $logAttributes = ['brand', 'model'];

    protected $table = "vehicles";

    protected $fillable = ['model', 'brand', 'vehicle_type'];

    protected $dates = ['deleted_at'];

    public function user(){
    	return $this->belongsTo('App\User', 'id');
    }

    public function admin(){
    	return $this->belongsTo('App\Admin', 'id');
    }
}