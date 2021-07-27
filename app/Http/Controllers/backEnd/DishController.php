<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chef;
use App\Models\Dish;
use App\Models\DishIngriedient;
use App\Models\DishCategory;
use Hash;



class DishController extends Controller
{
    public function index(Request $request, $chef_id){   
 
        $dishes    = Dish::with('chefName')->where('chef_id',$chef_id)->WhereNull('deleted_at')->get()->toArray();
        $page     = 'chefs';
        return view('backEnd.chefManagement.dishManagement.index', compact('page','dishes','chef_id')); 
    }

    public function add(Request $request, $chef_id){
        if($request->isMethod('post')){
            $data                               = $request->all();
            // dd($data);
            $add_dishes                           = new Dish;
            $add_dishes->name               =   $data['name'];
            $add_dishes->description        = isset($data['description']) ? $data['description'] : '';
            $add_dishes->price              = $data['price'];
            $add_dishes->time_taken         =  $data['time_taken'];
            // $add_dishes->category           =  $data['category'];
            $add_dishes->chef_id            = $chef_id;
            $add_dishes->status             = $data['status'];

            if(!empty($_FILES['dish_image']['name'])){
                $fileName = time() . '.' . $request->dish_image->extension();
         
                $base_url = url('images/dish');
                $request->dish_image->move(public_path('images/dish'), $fileName);
                $add_dishes->image = $base_url.'/'.$fileName;
            }
            if(!empty($_FILES['video']['name'])){
                $fileName = time() . '.' . $request->video->extension();
                $base_url = url('images/dish/video');
                $request->video->move(public_path('images/dish/video'), $fileName);
                $add_dishes->video = $base_url.'/'.$fileName;
            }

            if($add_dishes->save()){
                  if(!empty($data['ingredient'])){
                    foreach($data['ingredient'] as $key=>$ingredient){
                        $add_ingredients                    = new DishIngriedient;
                        $add_ingredients->dish_id           = $add_dishes->id;
                        $add_ingredients->ingredient_name   = $ingredient['name'];
                        $add_ingredients->quantity          = $ingredient['quantity'];
                        $add_ingredients->units             = $ingredient['units'];
                        $add_ingredients->required          = isset($ingredient['required']) ? $ingredient['required'] : 0;
                        $add_ingredients->save();
                    }
                }
                if(!empty($data['category'])){
                    foreach($data['category'] as $value){
                        $add_category           = new DishCategory;
                        $add_category->dish_id  = $add_dishes->id;
                        $add_category->type     = $value;
                        $add_category->save();
                    }
                }
                return redirect('/admin/chef/dish/'.$chef_id)->with('success','Dish Added successfully');
            }else{
                return redirect('/admin/chef/dish/'.$chef_id)->with('error',COMMON_ERROR);
            }
        }
        $DishCategory = [];
        $page     = 'chefs';
        return view('backEnd.chefManagement.dishManagement.form', compact('page','chef_id','DishCategory')); 
    }

    public function edit(Request $request, $dish_id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $edit_dish                     = Dish::find($dish_id);
            $edit_dish->name               = $data['name'];
            $edit_dish->description        = isset($data['description']) ? $data['description'] : '';
            $edit_dish->price              = $data['price'];
            // dd($data['category']);
            $edit_dish->time_taken         = $data['time_taken'];
            $edit_dish->category           = $data['category'];
            $edit_dish->status             = $data['status'];
            if(!empty($_FILES['dish_image']['name'])){
                $fileName = time() . '.' . $request->dish_image->extension();
         
                $base_url = url('images/dish');
                $request->dish_image->move(public_path('images/dish'), $fileName);
                $edit_dish->image = $base_url.'/'.$fileName;
            }
            if(!empty($_FILES['video']['name'])){
                $fileName = time() . '.' . $request->video->extension();
                $base_url = url('images/dish/video');
                $request->video->move(public_path('images/dish/video'), $fileName);
                $edit_dish->video = $base_url.'/'.$fileName;
            }
            if($edit_dish->save()){
                $delete_dish_ingriedent =  DishIngriedient::where('dish_id',$data['dish_id'])->delete();
                if(!empty($data['ingredient'])){
                    foreach($data['ingredient'] as $key=>$ingredient){
                        $add_ingredients                    = new DishIngriedient;
                        $add_ingredients->dish_id           = $dish_id;
                        $add_ingredients->ingredient_name   = $ingredient['name'];
                        $add_ingredients->quantity          = $ingredient['quantity'];
                        $add_ingredients->required          = isset($ingredient['required']) ? $ingredient['required'] : 0;
                        $add_ingredients->save();
                    }
                }
                $delete_dish_ingriedent =  DishCategory::where('dish_id',$data['dish_id'])->delete();
                if(!empty($data['category'])){
                    foreach($data['category'] as $value){
                        $add_category           = new DishCategory;
                        $add_category->dish_id  = $dish_id;
                        $add_category->type     = $value;
                        $add_category->save();
                    }
                }

                return redirect()->back()->with('success','Dish Edited Successfully');
            }else{
                return redirect()->back()->with('error',COMMON_ERROR);
            }
        }
        $DishCategory   = DishCategory::where('dish_id',$dish_id)->pluck('type')->toArray();
        // dd($DishCategory);
        $dish           = Dish::with('dish_ingredients')->where('id',$dish_id)->first();
        $chef_id        = $dish['chef_id'];
        $page           = 'chefs';
        return view('backEnd.chefManagement.dishManagement.form', compact('page','dish_id','dish','chef_id','DishCategory')); 
    }

    public function delete($dish_id){
        $del = Dish::where('id',$dish_id)->update(['deleted_at'=>date('Y-m-d h:i:s')]);
        if($del){
            return redirect()->back()->with('success','Dish Deleted successfully');
        } else{
            return redirect()->back()->with('error',COMMON_ERROR);
        }
    }

}
