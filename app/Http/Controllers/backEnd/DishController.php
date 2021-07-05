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
    public function index(Request $request, $chef_id){   
 
        $dishes    = Dish::with('chefName')->where('chef_id',$chef_id)->WhereNull('deleted_at')->get()->toArray();

        $page     = 'dishes';
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
                return redirect('/admin/chef/dish/'.$chef_id)->with('success','Dish Added successfully');
            }else{
                return redirect('/admin/chef/dish/'.$chef_id)->with('error',COMMON_ERROR);
            }
        }
       
        $page     = 'dishes';
        return view('backEnd.chefManagement.dishManagement.form', compact('page','chef_id')); 
    }

    public function delete($id){
        $del = Dish::where('id',$id)->update(['deleted_at'=>date('Y-m-d h:i:s')]);
        if($del){
            return redirect()->back()->with('success','Dish Deleted successfully');
        } else{
            return redirect()->back()->with('error',COMMON_ERROR);
        }
    }

}
