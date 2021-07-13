<?php

namespace App\Http\Controllers\backEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Chef;
use App\Models\Country;
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
            $add_chef->full_name                = $data['full_name'];
            $add_chef->business_name            = $data['business_name'];
            $add_chef->country_code             = $data['country_code'];           
            $add_chef->phone_number             = $data['phone_number'];           
            $add_chef->gender                   = $data['gender'];           
            $add_chef->email                    = $data['email'];   
            $add_chef->street_name              = $data['street_name'];   
            $add_chef->country                  = $data['country'];
            $add_chef->state                    = $data['state'];   
            $add_chef->city                     = $data['city'];   
            $add_chef->dob                      = date('Y-m-d',strtotime($data['dob']));
            $hash_password                      = Hash::make($data['password']);
            $add_chef->password                 = str_replace("$2y$", "$2a$", $hash_password);
            $add_chef->phone_number             = $data['phone_number'];
            $add_chef->status                   = $data['status'];
            $add_chef->years_of_experience      = $data['years_of_experience'];
            // $add_chef->alternative_country_code = $data['alternative_country_code'];
            $add_chef->alternative_phone_number = $data['alternative_phone_number'];
            $add_chef->building_description     = $data['building_description'];
            if(!empty($_FILES['profile_image']['name'])){
                $fileName = time() . '.' . $request->profile_image->extension();
                $base_url = url('images/users');
                $request->profile_image->move(public_path('images/users'), $fileName);
                $add_chef->profile_image = $base_url.'/'.$fileName;
            }

          

            if($add_chef->save()){
                return redirect('admin/chef')->with('success','Chef Added successfully');
            }else{
                return redirect('admin/chef')->with('error',COMMON_ERROR);
            }
        }
        $countries = Country::get()->toArray();
        $page     = 'chefs';
        return view('backEnd.chefManagement.form', compact('page','countries')); 
    }

    public function edit(Request $request, $id){

        if($request->isMethod('post')){
            $data                                  = $request->all();
            $update_chef                           = Chef::find($id);
            $update_chef->full_name                = $data['full_name'];
            $update_chef->business_name            = $data['business_name'];
            $update_chef->country_code             = $data['country_code'];           
            $update_chef->phone_number             = $data['phone_number'];           
            $update_chef->gender                   = $data['gender'];           
            // $update_chef->email                    = $data['email'];   
            $update_chef->street_name              = $data['street_name'];   
            $update_chef->country                  = $data['country'];
            $update_chef->state                    = $data['state'];   
            $update_chef->city                     = $data['city'];   
            $update_chef->dob                      = date('Y-m-d',strtotime($data['dob']));
            $hash_password                         = Hash::make($data['password']);
            $update_chef->password                 = str_replace("$2y$", "$2a$", $hash_password);
            $update_chef->phone_number             = $data['phone_number'];
            $update_chef->status                   = $data['status'];
            $update_chef->years_of_experience      = $data['years_of_experience'];
            // $update_chef->alternative_country_code = $data['alternative_country_code'];
            $update_chef->alternative_phone_number = $data['alternative_phone_number'];
            $update_chef->building_description     = $data['building_description'];
            if(!empty($_FILES['profile_image']['name'])){
                $fileName = time() . '.' . $request->profile_image->extension();
                $base_url = url('images/users');
                $request->profile_image->move(public_path('images/users'), $fileName);
                $update_chef->profile_image = $base_url.'/'.$fileName;
            }
            
            if($update_chef->save()){
                return redirect('admin/chef')->with('success','Chef Updated successfully');
            }else{
                return redirect('admin/chef')->with('error',COMMON_ERROR);
            }
        }
        $countries = Country::get()->toArray();
        $chef   = Chef::Where('id',$id)->first();
        $page   = 'chefs';
        return view('backEnd.chefManagement.form', compact('page','chef','id','countries')); 
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
