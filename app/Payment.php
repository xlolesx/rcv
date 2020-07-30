<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Payment extends Model
{
    use LogsActivity;

    protected static $logName = "Pago";

    protected $table = 'payments';

    protected $fillable = [
    	'bill',
    ];
    
}
