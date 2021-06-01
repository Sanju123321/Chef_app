<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Hash;

class UserManagementController extends Controller
{
    public function index(Request $request){
    
        $users    = User::select('*')->where('deleted_at',NULL)->get()->toArray();
        $page = 'users';
        return view('backEnd.userManagement.index', compact('page','users')); 
    }

    public function add(Request $request){
      
        if($request->isMethod('post')){
            $data                   = $request->all();
            $user                   = new User;
            $user->first_name       = $data['first_name'];
            $user->last_name        = $data['last_name'];
            $user->user_name        = $data['first_name'].''.$data['last_name'] ;
            $email                  = User::where('email',$data['email'])->count();
            if($email > 0){
                return redirect('admin/user/add')->with('error','Email Already Exists');
            }else{
                $user->email            = $data['email'];
            }           
            $hash_password          = Hash::make($data['password']);
            $user->password         = str_replace("$2y$", "$2a$", $hash_password);
            $user->mobile_number    = $data['mobile_number'];
            $user->status           = $data['status'];
            $user->gender           = $data['gender'];

            if(!empty($_FILES['profile_image']['name'])){

                $info = pathinfo($_FILES['profile_image']['name']);
                $extension = $info['extension'];
                $random = uniqid();
                $new_name = $random.'.'.$extension;

                if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'){
                    $file_path = base_path().'/'.UserProfileBasePath;
                    move_uploaded_file($_FILES['profile_image']['tmp_name'], $file_path.'/'.$new_name);

                    $user->profile_image = $new_name;
                }
            }
            if($user->save()){
                return redirect('admin/user')->with('success','User added successfully');
            }else{
                return redirect('admin/user')->with('error',COMMON_ERROR);
            }
        }
        $page = "users";
        return view('backEnd.userManagement.form',compact('page'));
    }

    public function edit(Request $request, $id){

        if($request->isMethod('post')){
            $data                        = $request->all();
            $user_edit                   = User::find($id);
            $user_edit->first_name       = $data['first_name'];
            $user_edit->last_name        = $data['last_name'];
            $user_edit->user_name        = $data['first_name'].''.$data['last_name'] ;
            $hash_password               = Hash::make($data['password']);
            $user_edit->password         = str_replace("$2y$", "$2a$", $hash_password);
            $user_edit->mobile_number    = $data['mobile_number'];
            $user_edit->status           = $data['status'];
            $user_edit->gender           = $data['gender'];

            if(!empty($_FILES['profile_image']['name'])){

                $info = pathinfo($_FILES['profile_image']['name']);
                $extension = $info['extension'];
                $random = uniqid();
                $new_name = $random.'.'.$extension;

                if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'){
                    $file_path = base_path().'/'.UserProfileBasePath;
                    move_uploaded_file($_FILES['profile_image']['tmp_name'], $file_path.'/'.$new_name);

                    $user_edit->profile_image = $new_name;
                }
            }

            if($user_edit->save()){
                return redirect()->back()->with('success','User edited successfully');
            } else{
                return redirect('admin/users')->with('error',COMMON_ERROR);
            }
        }

        $user = User::where('id',$id)->first();
        $page = "users";
        return view('backEnd.userManagement.form',compact('page','user','id'));
    }

    public function delete($user_id){
        $del = User::where('id',$user_id)->update(['deleted_at'=>date('Y-m-d h:i:s')]);
        if($del){
            return redirect()->back()->with('success','User deleted successfully');
        } else{
            return redirect()->back()->with('error',COMMON_ERROR);
        }
    }

    public function validate_email(){

        $email = $_GET['email'];
        $count = User::where('email',$email)->count();
        if($count >0){
            return 'false';
        } else{
            return 'true';
        }
    }


}
