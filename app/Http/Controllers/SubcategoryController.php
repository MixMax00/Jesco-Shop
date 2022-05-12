<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Categors;
use Str;
use Auth;

use Carbon\Carbon;

class SubcategoryController extends Controller
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
    $sub_categories = Subcategory::all();
    return view('subcategory.viewSubCategory', compact('sub_categories'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $categories = Categors::all();
      return view('subcategory.addSubCategory',[
        'categories' => $categories,
      ]);
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
      'category_id' => 'required',
      'sub_category_name' => 'required',
      ]);

    $sub_category_name = Str::lower($request->sub_category_name);
    $category_id = $request->category_id;

    // echo $category_name;
    if (Subcategory::Where('Sub_category_name','=', $sub_category_name)->doesntExist()) {
      Subcategory::insert([
        'category_id' => $category_id,
        'sub_category_name' => $sub_category_name,
        'added_by' =>auth::user()->id,
        'created_at' =>Carbon::now(),
      ]);
    }else {
       return back()->with('allDone','Already Inserted !!!');
    }
    return back()->with('insDone','Insert Successfully !!!');



  }

  public function unPublised($id)
  {
    $category = Subcategory::find($id);
    $category->status = 0;
    $category->save();

    return back()->with('errUnpub','Unpublised Category Successfully!!');
  }
  public function publised($id)
  {
    $category = Subcategory::find($id);
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

    $sub_category = Subcategory::find($id);
    return view('subcategory.edit', compact('sub_category'));

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
      'Sub_category_name' => 'required',
    ]);
    $sub_category_id = $request->sub_category_id;
    $category_name = Str::lower($request->Sub_category_name);
    if (Subcategory::Where('category_name','=', $Sub_category_name)->doesntExist()) {
      Subcategory::Where('id',$sub_category_id)->update([
        'category_name' => $Sub_category_name,
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
  Subcategory::find($id)->delete();

      return back()->with('errTras','Delete Category Successfully!!');


  }
  public function trashedCategory()
  {
    $sub_categories =   Subcategory::onlyTrashed()->get();
    return view('subcategory.trashed', compact('sub_categories'));

  }
  public function restore($id)
  {
    Subcategory::withTrashed()->where('id', $id)->restore();
    return redirect('category/viewSubCategory')->with('errstore','Category Restore Successfully!!');
  }
  public function delete($id)
  {

    Subcategory::withTrashed()->find($id)->forceDelete();
    return back()->with('del','Delete Successfully');

  }
}
