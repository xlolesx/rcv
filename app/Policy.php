<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;


class Policy extends Model
{
	use SoftDeletes, LogsActivity;

    protected static $logName = "Poliza";

    protected $table = "policies";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'client_name', 'client_lastname','client_ci','vehicle_registration', 'vehicle_type', 'vehicle_brand','vehicle_model','user_id','price_id','vehicle_id', 'vehicle_bodywork_serial','vehicle_weight','vehicle_motor_serial','vehicle_certificate_number','type','used_for','vehicle_color','vehicle_year','client_email','client_phone'
    ];

    public function vehicle(){
    	return $this->belongsTo('App\Vehicle');
    }

    public function user(){					//aqui     //alla
    	return $this->belongsTo('App\User', 'user_id', 'id')->withTrashed();
    }

    public function price(){                 //aqui     //alla
        return $this->belongsTo('App\Price', 'price_id', 'id')->withTrashed();
    }
    
}
