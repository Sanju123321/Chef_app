<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = "admins";

    protected $fillable = [
        'name', 'email'
    ];

    public static function randomNumber(){
    	$time = time();
    	$num = rand(1111,9999);
    	$str = str_random(2);
    	$random = $str.$time.$num;
    	return $random;

    }
}
