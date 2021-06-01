<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, Hash;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function index(Request $request){

    	$admin_id = Auth::guard('admin')->user()->id;
    	$admin = Admin::where('id',$admin_id)->first();

    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo '<pre>'; print_r($data); die;

    		$admin->name  = $data['name'];
    		$admin->email = $data['email'];

    		if(!empty($_FILES['image']['name'])){
    			// echo '<pre>'; print_r($_FILES);

    			$info = pathinfo($_FILES['image']['name']);
    			$extension = $info['extension'];
    			$random = rand(0000000,9999999);
    			$new_name = $random.'.'.$extension;

    			if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'){
    				$file_path = base_path().'/'.AdminProfileBasePath;
    				if(!empty($admin->image)){
    					unlink($file_path.'/'.$admin->image);
    				}
    				move_uploaded_file($_FILES['image']['tmp_name'], $file_path.'/'.$new_name);

    				$admin->image = $new_name;
    			}
    		}

    		if($admin->save()){
    			return redirect('admin/profile')->with('success','Profile updated successfully');
    		} else{
    			return redirect('admin/profile')->with('error',COMMON_ERROR);
    		}
    	}

    	$page = 'profile';

    	return view('backEnd.admin.profile',compact('admin','page'));
    }

    public function change_password(Request $request){

    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;

    		$admin_id = Auth::guard('admin')->user()->id;
    		$admin = Admin::where('id',$admin_id)->first();

			if($data['new_password'] != $data['confirm_password']){
				return redirect()->back()->with('error',"Password and confirm password doesn't matched");
			}

			$credentials = array(
						'email'=>$admin->email,
						'password'=>$data['current_password']
					);
			if(Auth::guard('admin')->attempt($credentials)){

				$admin->password = Hash::make($data['new_password']);
				if($admin->save()){
					return redirect()->back()->with('success',"Password changed successfully");		
				} else{
					return redirect()->back()->with('error',COMMON_ERROR);		
				}

			} else{
				return redirect()->back()->with('error',"Incorrect current password");	
			}
    	}
    }
}
