<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categors;
use Str;
use Auth;

use Carbon\Carbon;

class CategoryController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Categors::all();
      return view('category.viewCategory', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'category_name' => 'required',
      ]);

      $category_name = Str::lower($request->category_name);

      // echo $category_name;
      if (Categors::Where('category_name','=', $category_name)->doesntExist()) {
        Categors::insert([
          'category_name' => $category_name,
          'added_by' =>auth::user()->id,
          'created_at' =>Carbon::now(),
        ]);
      }else {
         return back()->with('allDone','Already Inserted !!!');
      }
      return back()->with('insDone','Inset Successfully !!!');



    }

    public function unPublised($id)
    {
      $category = Categors::find($id);
      $category->status = 0;
      $category->save();

      return back()->with('errUnpub','Unpublised Category Successfully!!');
    }
    public function publised($id)
    {
      $category = Categors::find($id);
      $category->status = 1;
      $category->save();

      return back()->with('errpub','Publised Category Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $category = Categors::find($id);
      return view('category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $request->validate([
        'category_name' => 'required',
      ]);
      $category_id = $request->category_id;
      $category_name = Str::lower($request->category_name);
      if (Categors::Where('category_name','=', $category_name)->doesntExist()) {
        Categors::Where('id',$category_id)->update([
          'category_name' => $category_name,
          'added_by' =>auth::user()->id,
          'updated_at' =>Carbon::now(),
        ]);
      }else {
         return back()->with('insErr','Already Inserted !!!');
      }
      return back()->with('upDone','Update Successfully !!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    Categors::find($id)->delete();

        return back()->with('errTras','Delete Category Successfully!!');


    }
    public function trashedCategory()
    {
      $categories =   Categors::onlyTrashed()->get();
      return view('category.trashed', compact('categories'));

    }
    public function restore($id)
    {
      Categors::withTrashed()->where('id', $id)->restore();
      return redirect('category/viewCategory')->with('errstore','Category Restore Successfully!!');
    }
    public function delete($id)
    {

      Categors::withTrashed()->find($id)->forceDelete();
      return back()->with('del','Delete Successfully');

    }

}
