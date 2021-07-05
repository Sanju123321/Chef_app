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
use App\Models\Admin;
use Mail, Hash, Auth;

class CommonController extends Controller
{
    public function chef_listing(Request $request){
        $chef_list = Chef::WhereNull('deleted_at')->orderby('id','desc')->get()->toArray();
        $resp['status'] =   'true';
        $resp['msg']    =   'Chef Listing';
        $resp['data']   =   $chef_list;
        return $resp;

    }

    public function dish_listing(Request $request){
        $dish_list = Dish::with('chefName','dish_ingredients')->WhereNull('deleted_at')->orderby('id','desc')->get()->toArray();
        $resp['status'] =   'true';
        $resp['msg']    =   'Dish Listing';
        $resp['data']   =   $dish_list;
        return $resp;

    }

    public function dish_details(Request $request, $dish_id){

        $dish_list = Dish::with('chefName','dish_ingredients')->where('id',$dish_id)->first();
     
        $resp['status'] =   'true';
        $resp['msg']    =   'Dish Details';
        $resp['data']   =   $dish_list;
        return $resp;

    }
}