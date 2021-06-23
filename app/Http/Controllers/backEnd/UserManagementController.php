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
            $data                           = $request->all();
            $user                           = new User;
            $user->name                     = $data['name'];          
            $user->phone_number             = $data['phone_number'];           
            $user->gender                   = $data['gender'];           
            $user->email                    = $data['email']; 
            $hash_password                  = Hash::make($data['password']);
            $user->password                 = str_replace("$2y$", "$2a$", $hash_password);
            $user->phone_number             = $data['phone_number'];
            $user->status                   = $data['status'];
            $user->description              = isset($data['description']) ? $data['description'] : '';
            if(!empty($_FILES['profile_image']['name'])){
                $fileName = time() . '.' . $request->profile_image->extension();
                $base_url = url('images/Chef');
                $request->profile_image->move(public_path('images/Chef'), $fileName);
                $user->image = $base_url.'/'.$fileName;
            }

            if($user->save()){
                return redirect('admin/user')->with('success','User Added successfully');
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
            $user_edit                           = User::find($id);
            $user_edit->name                     = $data['name'];          
            $user_edit->phone_number             = $data['phone_number'];           
            $user_edit->gender                   = $data['gender'];           
            $user_edit->email                    = $data['email']; 
            $hash_password                       = Hash::make($data['password']);
            $user_edit->password                 = str_replace("$2y$", "$2a$", $hash_password);
            $user_edit->phone_number             = $data['phone_number'];
            $user_edit->status                   = $data['status'];
            $user_edit->description              = isset($data['description']) ? $data['description'] : $user_edit->description;
            if(!empty($_FILES['profile_image']['name'])){
                $fileName = time() . '.' . $request->profile_image->extension();
                $base_url = url('images/Chef');
                $request->profile_image->move(public_path('images/Chef'), $fileName);
                $user_edit->image = $base_url.'/'.$fileName;
            }

            if($user_edit->save()){
                return redirect()->back()->with('success','User Edited successfully');
            } else{
                return redirect('admin/user')->with('error',COMMON_ERROR);
            }
        }

        $user = User::where('id',$id)->first();
        $page = "users";
        return view('backEnd.userManagement.form',compact('page','user','id'));
    }

    public function delete($id){
        $del = User::where('id',$id)->update(['deleted_at'=>date('Y-m-d h:i:s')]);
        if($del){
            return redirect()->back()->with('success','User Deleted successfully');
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
