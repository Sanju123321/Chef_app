<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chef;
use App\Models\Dish;
use App\Models\DishIngriedient;
use Hash;


class DishController extends Controller
{
    public function index(Request $request){   
        $dishes    = Dish::with('chefName')->WhereNull('deleted_at')->get()->toArray();
        // dd($dishes);
        $page     = 'dishes';
        return view('backEnd.dishManagement.index', compact('page','dishes')); 
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $data                               = $request->all();
            $add_dishes                           = new Dish;
            $add_dishes->name      =   $data['name'];
            $add_dishes->description  = isset($data['description']) ? $data['description'] : '';
            $add_dishes->price  = $data['price'];
            $add_dishes->time_taken  =  $data['time_taken'];
            $add_dishes->chef_id  = $data['chef_name'];
            $add_dishes->status = $data['status'];
            if(!empty($_FILES['dish_image']['name'])){
                $fileName = time() . '.' . $request->dish_image->extension();
                $base_url = url('images/dish');
                $request->dish_image->move(public_path('images/dish'), $fileName);
                $add_dishes->image = $base_url.'/'.$fileName;
            }

            if($add_dishes->save()){
                return redirect('admin/dish')->with('success','Dish Added successfully');
            }else{
                return redirect('admin/dish')->with('error',COMMON_ERROR);
            }
        }
        $chefs    = Chef::WhereNull('deleted_at')->get()->toArray();
        $page     = 'dishes';
        return view('backEnd.dishManagement.form', compact('page','chefs')); 
    }

    public function delete($id){
        $del = Dish::where('id',$id)->delete();
        if($del){
            return redirect()->back()->with('success','Dish Deleted successfully');
        } else{
            return redirect()->back()->with('error',COMMON_ERROR);
        }
    }

}
