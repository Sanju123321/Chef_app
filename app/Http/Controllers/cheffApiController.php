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
use App\Models\Admin;
use Mail, Hash, Auth;
use App\Models\Chef;
// chefApi

class cheffApiController extends Controller
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

        $chef                               = new Chef();
        $chef->full_name                    = $data['full_name'];
        $chef->business_name                = $data['business_name'];
        $chef->country_code                 = $data['country_code'];
        $chef->phone_number                 = $data['phone_number'];
        $chef->email                        = $data['email'];
        $hash_password                      = Hash::make($data['password']);
        $chef->password                     = str_replace("$2y$", "$2a$", $hash_password);
        $chef->gender                       = $data['gender'];
        $chef->dob                          = date('Y-m-d',strtotime($data['dob']));
        $chef->years_of_experience          = $data['years_of_experience'];
        $chef->street_name                  = $data['street_name'];
        $chef->city                         = $data['city'];
        $chef->state                        = $data['state'];
        $chef->country                      = $data['country'];
        $chef->status                       = 'Active';
        $chef->alternative_country_code     = isset($data['alternative_country_code']) ? $data['alternative_country_code'] : Null;
        $chef->alternative_phone_number     = isset($data['alternative_phone_number']) ? $data['alternative_phone_number'] : Null;
        $chef->building_description         = isset($data['building_description']) ? $data['building_description'] : Null;
        if ($chef->save()) {
            return response()->json(['success' => true, 'data' => $chef], Response::HTTP_OK);
        } else {
            return response()->json(['error' => false, 'data' => 'Something went wrong, Please try again later.']);
        }
    }
    
    public function chef_login(Request $request)
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
}
