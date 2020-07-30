<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;


class Price extends Model
{
	use SoftDeletes, LogsActivity;

    protected $table = "prices";

    protected static $logName = "Precio";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'description', 'damage_things', 'premium1', 'damage_people','premium2','disability','premium3','legal_assistance','premium4','death','premium5','medical_expenses','premium6','crane','total_premium', 'total_all'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }

}
