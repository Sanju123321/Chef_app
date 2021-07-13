<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chef;
use App\Models\DishIngriedient;

class Dish extends Model
{
    use HasFactory;
    protected $table = "dishes";
    protected $fillable = [
        'name','image','description','price','time_taken','chef_id','video','status'
    ];

    public function chefName(){
        return $this->hasOne(Chef::class, 'id', 'chef_id')->select('id','full_name');
    }

    public function dish_ingredients(){
        return $this->hasMany(DishIngriedient::class, 'dish_id', 'id');
    }



}
