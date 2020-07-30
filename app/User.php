<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable, LogsActivity;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected static $logName = "Usuario";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'username', 'name', 'lastname', 'ci', 'email', 'password', 'profit_percentage', 'office_id','phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vehicles(){
        return $this->hasMany('App\Vehicle');
    }

    public function policies(){
        return $this->hasMany('App\Policy');
    }
    public function payments(){
        return $this->hasMany('App\Payment');
    }

    public function office(){
        return $this->belongsTo('App\Office', 'office_id', 'id')->withTrashed();
    }

    public function logs(){
        return $this->hasMany('App\ActivityLog', 'causer_id', 'id')->withTrashed();
    }

}
