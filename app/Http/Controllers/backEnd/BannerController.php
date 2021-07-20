<?php

namespace App\Http\Controllers\backEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(Request $request){
        $banners  = Banner::get()->toArray();
        $page     = 'banner';
        return view('backEnd.bannerManagement.index', compact('page','banners')); 
    }

        public function edit(Request $request, $id){

        if($request->isMethod('post')){
            $data                                  = $request->all();
            $update_banner                           = Banner::find($id);

            if(!empty($_FILES['image']['name'])){
                $fileName = time() . '.' . $request->image->extension();
                $base_url = url('images/banner');
                $request->image->move(public_path('images/banner'), $fileName);
                $update_banner->image = $base_url.'/'.$fileName;
            }
            
            if($update_banner->save()){
                return redirect('admin/banner')->with('success','Banner Updated successfully');
            }else{
                return redirect('admin/banner')->with('error',COMMON_ERROR);
            }
        }

        $banner = Banner::Where('id',$id)->first();
        $page   = 'chefs';
        return view('backEnd.bannerManagement.form', compact('page','banner','id')); 
    }
}
