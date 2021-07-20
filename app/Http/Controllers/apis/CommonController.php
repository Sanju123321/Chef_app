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

    public function chef_details(Request $request, $chef_id){
        $chef_details   =   Chef::WhereNull('deleted_at')->where('id',$chef_id)->first();
        $resp['status'] =   'true';
        $resp['msg']    =   'Chef Details';
        $resp['data']   =   $chef_details;
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

    public function country_list(Request $request){
        $country_list = country::get()->toArray();
        $resp['status'] =   'true';
        $resp['msg']    =   'Country List';
        $resp['data']   =   $country_list;
        return $resp;
    }

    public function dish_searching(Request $request){
        $data           = $request->all();
        $search         = $data['search'];

        $dish_search    = Dish::with('dish_ingredients')
                                    ->where(function($q) use($search) {
                                        $q->where('name','like','%'.$search.'%');
                                    })
                                    ->whereNull('deleted_at')
                                    ->get()->toArray();
        if(!empty($dish_search)){
            $resp['status'] = 'true';
            $resp['msg']    = 'Dish search result';
            $resp['data']   = $dish_search;
        }else{
            $resp['status'] = 'false';
            $resp['msg']    =   'no Record found';   
        }
        return $resp; 
    }
}