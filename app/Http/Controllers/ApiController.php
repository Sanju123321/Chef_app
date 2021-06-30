<?php

namespace App\Http\Controllers;
use JWTAuth;
use Validator;
use IlluminateHttpRequest;
use AppHttpRequestsRegisterAuthRequest;
use TymonJWTAuthExceptionsJWTException;
use SymfonyComponentHttpFoundationResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Chef;
use App\Models\Admin;
use Mail, Hash, Auth;

class ApiController extends Controller
{
    public function chef_registration(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'full_name'             => 'required',
                'business_name'         => 'required',
                'country_code'          => 'required',
                'phone_number'          => 'required',
                'email'                 => 'required|email',
                'password'              => 'required',
                'confirm_password'      => 'required|same:password',
                'gender'                => 'required',
                'dob'                   => 'required',
                'years_of_experience'   => 'required',
                'street_name'           => 'required',
                'city'                  => 'required',
                'state'                 => 'required',
                'country'               => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }

        $check_email_exists = Chef::where('email', $data['email'])->first();
        if (!empty($check_email_exists)) {
            return response()->json(['error' => 'This Email is already exists.'], 200);
        }


        $add_chef                               = new Chef();
        $add_chef->full_name                    = $data['full_name'];
        $add_chef->business_name                = $data['business_name'];
        $add_chef->country_code                 = $data['country_code'];
        $add_chef->phone_number                 = $data['phone_number'];
        $add_chef->email                        = $data['email'];
        $hash_password                         = Hash::make($data['password']);
        $add_chef->password                     = str_replace("$2y$", "$2a$", $hash_password);
        $add_chef->gender                       = $data['gender'];
        $add_chef->dob                          = date('Y-m-d',strtotime($data['dob']));
        $add_chef->years_of_experience          = $data['years_of_experience'];
        $add_chef->street_name                  = $data['street_name'];
        $add_chef->city                         = $data['city'];
        $add_chef->state                        = $data['state'];
        $add_chef->country                      = $data['country'];
        $add_chef->status                       = 'Active';
        $add_chef->alternative_country_code     = isset($data['alternative_country_code']) ? $data['alternative_country_code'] : Null;
        $add_chef->alternative_phone_number     = isset($data['alternative_phone_number']) ? $data['alternative_phone_number'] : Null;
        $add_chef->building_description         = isset($data['building_description']) ? $data['building_description'] : Null;
        if ($add_chef->save()) {
            return response()->json(['success' => true, 'data' => $add_chef], Response::HTTP_OK);
        } else {
            return response()->json(['error' => false, 'data' => 'Something went wrong, Please try again later.']);
        }
    }

    public function user_registration(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
            
                'name'               => 'required',          
                'phone_number'       => 'required',           
                'gender'             => 'required',
                'email'              => 'required|email',
                'password'           => 'required',
                'confirm_password'   => 'required|same:password',
                'full_name'          => 'required',
                'country_code'       => 'required',
                'address'            => 'required',
                'city'               => 'required',
                'state'              => 'required',
                'country'            => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }
        $check_email_exists = User::where('email', $data['email'])->first();
        if (!empty($check_email_exists)) {
            return response()->json(['error' => 'This Email is already exists.'], 200);
        }

            $add_user                           = new User;
            $add_user->full_name                = $data['full_name'];          
            $add_user->name                     = $data['name'];          
            $add_user->phone_number             = $data['phone_number'];           
            $add_user->gender                   = $data['gender'];           
            $add_user->email                    = $data['email']; 
            $hash_password                      = Hash::make($data['password']);
            $add_user->password                 = str_replace("$2y$", "$2a$", $hash_password);
            $add_user->status                   = 'active';
            $add_user->description              = isset($data['description']) ? $data['description'] : '';
            $add->country_code                  = $data['country_code'];
            $add->address                       = $data['address'];
            $add->city                          = $data['city'];
            $add->state                         = $data['state'];
            $add->country                       = $data['country'];

        if ($add_user->save()) {
            return response()->json(['success' => true, 'data' => $add_user], Response::HTTP_OK);
        } else {
            return response()->json(['error' => false, 'data' => 'Something went wrong, Please try again later.']);
        }
    }

    public function chef_login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // print_r('here'); die;

        $validator = Validator::make(
            $request->all(),
            [
                'email'      => 'required|email',
                'password'   => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }
        $token = Auth('chef-api')->attempt($credentials);
        if ($token ) {
            return $this->respondWithToken($token);
        } else {
            $response = ["message" => 'Invalid Details'];
            return response($response, 422);
        }
    }


    public function user_login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make(
            $request->all(),
            [
                'email'      => 'required|email',
                'password'   => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }
        $token = auth()->attempt($credentials);
        if ($token ) {
            return $this->respondWithToken($token);
        } else {
            $response = ["message" => 'Invalid Details'];
            return response($response, 422);
        }
    }

    public function chef_forgot_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'      => 'required|email',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 200);
        }


        $check_email_exists = Chef::where('email', $request['email'])->first();
        if (empty($check_email_exists)) {
            return response()->json(['error' => 'Email not exists.'], 200);
        }


        $check_email_exists->secret_key           =  rand(1111, 9999);
        if ($check_email_exists->save()) {
            $project_name = env('App_name');
            $email = $request['email'];
            try {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    Mail::send('emails.user_forgot_password_api', ['name' => ucfirst($check_email_exists['first_name']) . ' ' . $check_email_exists['last_name'], 'otp' => $check_email_exists['secret_key']], function ($message) use ($email, $project_name) {
                        $message->to($email, $project_name)->subject('Chef Forgot Password');
                    });
                }
            } catch (Exception $e) {
            }
            return response()->json(['success' => true, 'data' => 'Email sent on registered Email-id.'], Response::HTTP_OK);
        } else {
            return response()->json(['error' => false, 'data' => 'Something went wrong, Please try again later.']);
        }
    }


    public function user_forgot_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'      => 'required|email',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 200);
        }


        $check_email_exists = User::where('email', $request['email'])->first();
        if (empty($check_email_exists)) {
            return response()->json(['error' => 'Email not exists.'], 200);
        }


        $check_email_exists->security_code           =  rand(1111, 9999);
        if ($check_email_exists->save()) {
            $project_name = env('App_name');
            $email = $request['email'];
            try {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    Mail::send('emails.user_forgot_password_api', ['name' => ucfirst($check_email_exists['name']) , 'otp' => $check_email_exists['security_code']], function ($message) use ($email, $project_name) {
                        $message->to($email, $project_name)->subject('User Forgot Password');
                    });
                }
            } catch (Exception $e) {
            }
            return response()->json(['success' => true, 'data' => 'Email sent on registered Email-id.'], Response::HTTP_OK);
        } else {
            return response()->json(['error' => false, 'data' => 'Something went wrong, Please try again later.']);
        }
    }
    public function chef_reset_password(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'secret_key'       =>  'required|numeric',
                'email'      => 'required|email',
                'password'   => 'required',
                'confirm_password' => 'required_with:password|same:password'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 200);
        }


        $email = $data['email'];
        $check_email = Chef::where('email', $email)->first();
        if (empty($check_email['secret_key'])) {
            return response()->json(['error' => 'Something went wrong, Please try again later.']);
        }
        if (empty($check_email)) {
            return response()->json(['error' => 'This Email-id is not exists.']);
        } else {
            if ($check_email['secret_key'] == $data['secret_key']) {
                $hash_password                  = Hash::make($data['password']);
                $check_email->password          = str_replace("$2y$", "$2a$", $hash_password);
                $check_email->secret_key               = null;
                if ($check_email->save()) {
                    return response()->json(['success' => true, 'message' => 'Password changed successfully.']);
                } else {
                    return response()->json(['error' => 'Something went wrong, Please try again later.']);
                }
            } else {
                return response()->json(['error' => 'secret_key mismatch']);
            }
        }
    }

    public function user_reset_password(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'secret_key'       =>  'required|numeric',
                'email'      => 'required|email',
                'password'   => 'required',
                'confirm_password' => 'required_with:password|same:password'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 200);
        }


        $email = $data['email'];
        $check_email = User::where('email', $email)->first();
        if (empty($check_email['security_code'])) {
            return response()->json(['error' => 'Something went wrong, Please try again later.']);
        }
        if (empty($check_email)) {
            return response()->json(['error' => 'This Email-id is not exists.']);
        } else {
            if ($check_email['security_code'] == $data['secret_key']) {
                $hash_password                  = Hash::make($data['password']);
                $check_email->password          = str_replace("$2y$", "$2a$", $hash_password);
                $check_email->security_code               = null;
                if ($check_email->save()) {
                    return response()->json(['success' => true, 'message' => 'Password changed successfully.']);
                } else {
                    return response()->json(['error' => 'Something went wrong, Please try again later.']);
                }
            } else {
                return response()->json(['error' => 'secret_key mismatch']);
            }
        }
    }

    public function chef_profile(Request $request)
    {

        try {
            $user = Auth('chef-api')->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error' => $e->getMessage()], 200);
        }

        return response()->json(['success' => true, 'data' => $user], 200);
    }

    public function user_profile(Request $request)
    {

        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error' => $e->getMessage()], 200);
        }

        return response()->json(['success' => true, 'data' => $user], 200);
    }

    public function Chef_updateProfile(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required',
                'mobile_number' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }

        $user_id = Auth('chef-api')::User()->id;
        $update_profile =  User::where('id',$user_id)->first();
        $update_profile->first_name         = $data['first_name'];
        $update_profile->mobile_number      = $data['mobile_number'];
        if ($update_profile->save()) {
            return response()->json(['success' => true, 'data' => 'User Profile Updated Successfully.'], Response::HTTP_OK);
        }else{
             return response()->json(['error' => 'Something went wrong, Please try again later.']);
        }

    }

 
    public function Chef_logout(Request $request)
    {
        Auth::guard('api')->logout();
        return response()->json(['message' => 'logout successfully', 'code' => 200]);
    }
    
    public function user_logout(Request $request)
    {
        auth()->logout();
        return response()->json(['message' => 'logout successfully', 'code' => 200]);
    }
    

    public function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'code' => 200,
            'expire_in' => auth()->factory()->getTTL() * 60
        ]);
    }}
