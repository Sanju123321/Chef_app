<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, Hash, Session, Mail;
use App\Models\Admin, App\Models\User;
use Socialite;

class AuthController extends Controller
{
    public function redirect($provider='facebook'){
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider){
            $userSocial =   Socialite::driver($provider)->stateless()->user();
            // dd($userSocial);
            $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        if($users){
                Auth::login($users);
                return redirect('admin/dashboard')->with('success','Welcome Back '.ucfirst($admin));
        }else{
        $user = Admin::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => 'facebook',
            ]);
         return  redirect('admin/dashboard')->with('success','Admin registered');
        }
    }

    public function login(Request $request){

    	if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard');
        }

    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo '<pre>'; print_r($data); die;

    		$credentials = array(
    				'email'=>$data['email'],
    				'password'=>$data['password']
    			);

    		if(Auth::guard('admin')->attempt($credentials)){
    			$admin = Admin::where('email',$data['email'])->value('name');
    			return redirect('admin/dashboard')->with('success','Welcome Back '.ucfirst($admin));
    		} else{
    			return redirect('admin/login')->with('error',"Invalid email and password combination");
    		}
    	}

    	return view('backEnd.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        Session::flush();
    	return redirect('admin/login')->with('success','You logged out successfully');
    }

    public function dashboard(){


    	$page = 'dashboard';
    	return view('backEnd.index',compact('page'));
    }

    public function check_admin_email(){

        $email = $_GET['email'];
        $check = Admin::where('email',$email)->count();
        if($check>0){
            return 'true';
        } else{
            return 'false';
        }
    }

    public function forgot_password(Request $request){

        if($request->isMethod('post')) {
            $data = $request->all();
            
            $admin_detail = Admin::select('*')->where('email',$data['email'])->first();
            if(empty($admin_detail)) {
                return redirect()->back()->with('error','This email does not exist');
            }else{
                $admin_id = $admin_detail->id;
            }
            
            $admin_set_password = Admin::find($admin_id);
            $random_no          = rand(111111,999999);
            $security_code      = base64_encode(convert_uuencode($random_no));
            $email              = $data['email'];
            $name               = ucfirst($admin_detail->name);
            
            $admin_set_password->security_code = $security_code;
        
            $company_name = PROJECT_NAME;

            if($admin_set_password->save())
            {   
                $set_password_url = url('/admin/set/password'.'/'.base64_encode(convert_uuencode($admin_id)).'/'.$security_code);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {   
                    Mail::send('emails.forgot_password', ['name'=>$name,'set_password_url'=>$set_password_url], function($message) use ($email,$company_name)
                    {
                        $message->to($email,$company_name)->subject($company_name.', Reset Password Mail');
                    });
                    return redirect()->back()->with('success','Reset password link has been sent to this email'); 
                }else{
                    return redirect()->back()->with('error',COMMON_ERROR);
                } 
            }else{
                return redirect('admin/login')->with('error',COMMON_ERROR); 
            }
        }
        return view('backEnd.forgot_password');    
    }

    public function set_password(Request $request,$admin_id,$security_code){
        
        $admin_id = convert_uudecode(base64_decode($admin_id));
        
        $admin_detail = Admin::select('id','security_code','email')->where('id',$admin_id)->first();
        if (!empty($admin_detail)) {
            $admin_security_code = $admin_detail->security_code;
        }else{
            return redirect()->back()->with('error',COMMON_ERROR);
        }
        
        if ($admin_security_code == $security_code) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                if ($data['password']==$data['confirm_password']) {
                    $admin = Admin::find($admin_id);
                    $admin->password =   Hash::make($data['password']);
                    if ($admin->save()) {
                        return redirect('admin/login')->with('success','Password changed successfully');
                    }else{
                        return redirect('admin/login')->with('error',COMMON_ERROR);
                    }
                }else{
                    return redirect()->back()->with('error','Password and Confirm password does not match, Please fill again');
                }
            }
        }else{
            return redirect('admin/forgot-password')->with('error','This link has been expired, Please send mail again');
        }
        return view('backEnd.set_password',['admin_detail'=>$admin_detail]);
    }
}
