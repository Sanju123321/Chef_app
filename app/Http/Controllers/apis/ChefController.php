<?php

namespace App\Http\Controllers\apis;
use JWTAuth;
use Validator;
use IlluminateHttpRequest;
use AppHttpRequestsRegisterAuthRequest;
use TymonJWTAuthExceptionsJWTException;
use SymfonyComponentHttpFoundationResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Chef;
use App\Models\Dish;
use App\Models\Country;
use App\Models\DishIngriedient;
use App\Models\Admin;
use Mail, Hash, Auth;

class ChefController extends Controller
{
    public function add_dish(Request $request){
        $data = $request->all();
        
        $chef = Auth('chef-api')->userOrFail();
        $add_dishes                     =   new Dish;
        $add_dishes->name               =   $data['name'];
        $add_dishes->description        =   isset($data['description']) ? $data['description'] : '';
        $add_dishes->price              =   $data['price'];
        $add_dishes->time_taken         =   $data['time_taken'];
        $add_dishes->category           =   $data['category'];
        $add_dishes->chef_id            =   $chef['id'];
        $add_dishes->status             =   'active';

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
            $resp['status'] = 'true';
            $resp['msg']    = 'Dish Added successfully';
        }else{
            $resp['status'] = 'false';
            $resp['msg']    = COMMON_ERROR;
        }
        return $resp;


    }

    public function edit_dish(Request $request){
        $data                           = $request->all();
        $dish_id                        = $data['dish_id'];
        $chef                           = Auth('chef-api')->userOrFail();
        
        $edit_dish                      = Dish::find($dish_id);
        $edit_dish->name                = $data['name'];
        $edit_dish->description         = isset($data['description']) ? $data['description'] : '';
        $edit_dish->price               = $data['price'];
        $edit_dish->time_taken          = $data['time_taken'];
        $edit_dish->category            = $data['category'];
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

            $resp['status'] = 'true';
            $resp['msg']    = 'Dish Edited Successfully';
        }else{
            $resp['status'] = 'false';
            $resp['msg']    = COMMON_ERROR;
        }
        return $resp;
    }

    public function delete_dish(Request $request){
        $data   = $request->all();
        $chef         = Auth('chef-api')->userOrFail();
        $delete_dish    = Dish::where('id',$data['dish_id'])->update(['deleted_at'=>date('Y-m-d h:i:s')]);
        if($delete_dish){
            $delete_ingredient = DishIngriedient::where('dish_id',$data['dish_id'])->delete();
            $resp['status'] = 'true';
            $resp['msg']    = 'Dish Deleted Successfully';
        }else{
            $resp['status'] = 'false';
            $resp['msg']    = COMMON_ERROR;   
        }
        return $resp; 

    }
}