<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;


use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
  public  function UserRole(){
      $all_role = Role::all();
      return view('role.role',compact('all_role'));
    }
  public  function StorRole(Request $request){
       $request->validate([
         'role' => 'required'
       ]);
       // print_r($request->all());
       $role = Str::upper($request->role);

       if (Role::Where('name','=', $role)->doesntExist()) {
         Role::insert([
           'name' => $role,
           'created_at' =>Carbon::now(),
         ]);
       }else {
          return back()->with('insErr','Already Inserted !!!');
       }


       return back();
  }
  
}
