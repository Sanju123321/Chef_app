<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chef;

class Dish extends Model
{
    use HasFactory;
    protected $table = "dishes";
    protected $fillable = [
        'name','image','description','price','time_taken','chef_id','video','status'
    ];

    public function chefName(){
        return $this->hasOne(Chef::class, 'id', 'chef_id')->select('id','name');
    }
}
