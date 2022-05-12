<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Auth;
use Image;
use Carbon\Carbon;

class BannerController extends Controller
{
    public function create()
    {
      return view('banner.addBanner');
    }
    public function store(Request $request)
    {
      $request->validate([
        'banner_title_one' =>'required',
        'banner_title_two' =>'required',
        'banner_img' =>'required|image',
      ]);

    $banner_id = Banner::insertGetId([
        'banner_title_one' => $request->banner_title_one,
        'banner_title_two' => $request->banner_title_two,
        'added_by' =>Auth::user()->id,
        'created_at' =>Carbon::now(),
      ]);

      if($request->hasfile('banner_img')){
        $banner_image = $request->file('banner_img');
        $banner_extion = $banner_image->getClientOriginalExtension();
        $banner_img_name = time().".".$banner_extion;
        $imageUrl = 'uploads/banner/';
        Image::make($banner_image)->save($imageUrl.$banner_img_name);

      }

      Banner::where('id', $banner_id)->update([
        'banner_img' =>$banner_img_name,
      ]);
      return back()->with('succ','Banner Image insert Successfully');

    }
    public function index()
    {
      $all_banner = Banner::all();
      return view('banner.viewBanner',[
        'all_banner' => $all_banner,
      ]);
    }

    public function edit($id)
    {
      $edit_banner = Banner::find($id);
      return view('banner.editBanner',[
        'edit_banner' => $edit_banner,
      ]);
    }

    public function update(Request $request){
      $request->validate([
        'banner_title_one' =>'required',
        'banner_title_two' =>'required',
      ]);

        if ($request->hasfile('banner_img')) {
          if(Banner::find($request->banner_id)->banner_img != 'banner-img.jpg'){
            unlink(base_path()."/uploads/banner/".Banner::find($request->banner_id)->banner_img);
          }

          $banner_image = $request->file('banner_img');
          $banner_extion = $banner_image->getClientOriginalExtension();
          $banner_img_name = time().".".$banner_extion;
          $imageUrl = 'uploads/banner/';
          Image::make($banner_image)->save($imageUrl.$banner_img_name);

          Banner::find($request->banner_id)->update([
            'banner_title_one' =>$request->banner_title_one,
            'banner_title_two' =>$request->banner_title_two,
            'added_by' =>Auth::user()->id,
            'updated_at' =>Carbon::now(),
            'banner_img' =>$banner_img_name,
          ]);
        }else {
            Banner::find($request->banner_id)->update([
              'banner_title_one' =>$request->banner_title_one,
              'banner_title_two' =>$request->banner_title_two,
              'added_by' =>Auth::user()->id,
              'updated_at' =>Carbon::now(),
            ]);
        }


        return redirect('/banner/viewBanner')->with('succUp','Banner Image Update Successfully');



    }
}
