<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishIngriedient extends Model
{
    use HasFactory;
    protected $table = "dish_ingredients";
    protected $fillable = [
        'dish_id','ingredient_name','quantity'
    ];
}
