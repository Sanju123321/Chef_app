<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Chef;
use Hash;

class ChefController extends Controller
{
    public function index(Request $request){   
        $chefs    = Chef::WhereNull('deleted_at')->get()->toArray();
        $page     = 'chefs';
        return view('backEnd.chefManagement.index', compact('page','chefs')); 
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $data                               = $request->all();
            $add_chef                           = new Chef;
            $add_chef->name                     = $data['name'];          
            $add_chef->phone_number             = $data['phone_number'];           
            $add_chef->gender                   = $data['gender'];           
            $add_chef->email                    = $data['email']; 
            $hash_password                      = Hash::make($data['password']);
            $add_chef->password                 = str_replace("$2y$", "$2a$", $hash_password);
            $add_chef->phone_number             = $data['phone_number'];
            $add_chef->status                   = $data['status'];
            $add_chef->description              = isset($data['description']) ? $data['description'] : '';
            if(!empty($_FILES['profile_image']['name'])){
                $fileName = time() . '.' . $request->profile_image->extension();
                $base_url = url('images/Chef');
                $request->profile_image->move(public_path('images/Chef'), $fileName);
                $add_chef->image = $base_url.'/'.$fileName;
            }

            if($add_chef->save()){
                return redirect('admin/chef')->with('success','Chef Added successfully');
            }else{
                return redirect('admin/chef')->with('error',COMMON_ERROR);
            }
        }
        $page     = 'chefs';
        return view('backEnd.chefManagement.form', compact('page')); 
    }

    public function edit(Request $request, $id){

        if($request->isMethod('post')){
            $data                                  = $request->all();
            $update_chef                           = Chef::find($id);
            $update_chef->name                     = $data['name'];          
            $update_chef->phone_number             = $data['phone_number'];           
            $update_chef->gender                   = $data['gender'];           
            $update_chef->email                    = $data['email']; 
            $hash_password                         = Hash::make($data['password']);
            $update_chef->password                 = str_replace("$2y$", "$2a$", $hash_password);
            $update_chef->phone_number             = $data['phone_number'];
            $update_chef->status                   = $data['status'];
            $update_chef->description              = isset($data['description']) ? $data['description'] : $update_chef->description;
            if(!empty($_FILES['profile_image']['name'])){
                $fileName = time() . '.' . $request->profile_image->extension();
                $base_url = url('images/Chef');
                $request->profile_image->move(public_path('images/Chef'), $fileName);
                $update_chef->image = $base_url.'/'.$fileName;
            }

            if($update_chef->save()){
                return redirect('admin/chef')->with('success','Chef Updated successfully');
            }else{
                return redirect('admin/chef')->with('error',COMMON_ERROR);
            }
        }
        $chef   = Chef::Where('id',$id)->first();
        $page   = 'chefs';
        return view('backEnd.chefManagement.form', compact('page','chef','id')); 
    }

    public function delete($id){
        $del = Chef::where('id',$id)->update(['deleted_at'=>date('Y-m-d h:i:s')]);
        if($del){
            return redirect()->back()->with('success','Chef Deleted successfully');
        } else{
            return redirect()->back()->with('error',COMMON_ERROR);
        }
    }
}
