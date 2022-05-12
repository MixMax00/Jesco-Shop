<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categors;
use App\Models\User;
use App\Models\Subcategory;

class AdminController extends Controller
{
    public function index()
    {
      $all_category = Categors::count();
      $all_user = User::count();
      $all_subcategory = Subcategory::count();
      return view('admin.home.home',[
        'all_category'=>$all_category,
        'all_user'    =>$all_user,
        'all_subcategory'    =>$all_subcategory,
      ]);
    }
}
