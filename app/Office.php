<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Office extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logName = "Oficina";

    protected $table = "offices";

    protected $dates = ['deleted_at'];

    protected $fillable = ['office_address', 'id_estado', 'id_municipio', 'id_parroquia'];

    public function estado(){
    	return $this->belongsTo('App\Estado', 'id_estado', 'id_estado');
    }

    public function municipio(){
    	return $this->belongsTo('App\Municipio', 'id_municipio', 'id_municipio');
    }

    public function parroquia(){
    	return $this->belongsTo('App\Parroquia', 'id_parroquia', 'id_parroquia');
    }
}
