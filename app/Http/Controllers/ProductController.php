<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categors;
use App\Models\Subcategory;

use Image;
use Carbon\Carbon;
use Auth;
use Str;

class ProductController extends Controller
{
    public function create()
    {

      $all_category = Categors::all();
      $all_subcategory = Subcategory::all();
      return view('product.addProduct',[
        'categores' => $all_category,
        'subcategores' => $all_subcategory,
      ]);
    }


    public function store(Request $request)
    {
        $request->validate([
        'product_name' =>'required|unique',
        'category_id'  =>'required',
        'subcategory_id' =>'required',
        'short_description'  =>'required',
        ]);



      $slug_name =  Str::slug(Str::lower($request->product_name));
      $sku = Str::substr($request->product_name,0,3)."-".Str::random();


      $product_id = Product::insertGetId([
        'category_id'  => $request->category_id,
        'subcategory_id'  => $request->subcategory_id,
        'product_name' => $request->product_name,
        'old_price'    => $request->old_price,
        'new_price'    => $request->new_price,
        'slug'         => $slug_name,
        'sku'          => $sku,
        'short_description' => $request->short_description,
        'long_description'  => $request->long_description,
        'weight'            => $request->weight,
        'dimensions'        => $request->dimensions,
        'materials'         => $request->materials,
        'other_info'        => $request->other_info,
        'Added_by'     => auth::user()->id,
        'created_at'   => Carbon::now(),
      ]);

      if($request->hasfile('product_image')){
        $product_image = $request->file('product_image');
        $image_extension = $product_image->getClientOriginalExtension();
        $product_image_name = time().'.'.$image_extension;
        $imageUrl ='uploads/product-image/';
        Image::make($product_image)->resize(270,310)->save($imageUrl.$product_image_name);


        Product::find($product_id)->update([
          'product_image' => $product_image_name,
        ]);
      }


      return back()->with('sccInsert','Product Insert Successfully!!');





    }

    public function index(){
      $all_product = Product::all();
      return view('product.viewProduct',[
        'all_product' =>$all_product,
      ]);
    }

    public function unPublised($id)
    {
    $product_status = Product::find($id);
    $product_status->status = 0;
    $product_status->save();
    return back()->with('errUnpub','Unpublised Product Successfully!!');

    }


    public function publised($id)
    {

     $product_status = Product::find($id);
     $product_status->status = 1;
     $product_status->save();
     return back()->with('errUnpub','Publised Product Successfully!!');
    }



    public function show($id)
    {
      // $all_category = Categors::find($id);
      // $all_subcategory = Categors::find($id);
      $single_product = Product::find($id);
      return view('product.singleProduct', [
        'single_product' => $single_product,
        'categores' => $all_category,
        'subcategores' => $all_subcategory,
      ]);
    }


    public function edit($id)
    {

      $products = Product::find($id);
      $all_category = Categors::all();
      $all_subcategory = Subcategory::all();
       return view('product.editProduct',[
         'categores' => $all_category,
         'subcategores' => $all_subcategory,
         'products' => $products,

       ]);
    }

    public function update(Request $request)
    {


      $slug_name =  Str::slug(Str::lower($request->product_name));
      $sku = Str::substr($request->product_name,0,3)."-".Str::random();

      if($request->hasfile('product_image')){
        if(Product::find($request->id)->product_image != 'product.jpg'){
        unlink("/uploads/product-image/".Product::find($request->id)->product_image);
        }
        $product_image = $request->file('product_image');
        $image_extension = $product_image->getClientOriginalExtension();
        $product_image_name_up = time().'.'.$image_extension;
        $imageUrl ='uploads/product-image/';
        Image::make($product_image)->resize(270,310)->save($imageUrl.$product_image_name_up);
      }

      Product::find($request->id)->update([
        'category_id'  => $request->category_id,
        'subcategory_id'  => $request->subcategory_id,
        'product_name' => $request->product_name,
        'old_price'    => $request->old_price,
        'new_price'    => $request->new_price,
        'slug'         => $slug_name,
        'sku'          => $sku,
        'short_description' => $request->short_description,
        'long_description'  => $request->long_description,
        'weight'            => $request->weight,
        'dimensions'        => $request->dimensions,
        'materials'         => $request->materials,
        'other_info'        => $request->other_info,
        'product_image' => $product_image_name_up,
        'Added_by'     => auth::user()->id,
        'created_at'   => Carbon::now(),
      ]);

      return back()->with('sccUpdate','Update Product Successfully!!');

    }


    public function categoryId(Request $request)
    {
      $category_id = Subcategory::where('category_id',$request->cat_id)->get();
      $output =   '<option value="">-----Select a Category------</option>';
      foreach ($category_id as $category) {
        echo $output = '<option value="'.$category->id.'">'.$category->sub_category_name.'</option>';
      }

    }


    public function tmp_delete($id)
    {
      Product::find($id)->trashed();
      return back()->with('errTras','Delete Successfully!!');
    }

    public function trash(){
      $all_product = Product::onlyTrashed()->get();
      return view('product.delete',[
        'all_product' =>$all_product,
      ]);
    }

    public function restore($id)
    {
      Product::withTrashed()->where('id', $id)->restore();
      return redirect('product/viewProduct')->with('errstore','Product Restore Successfully!!');
    }

    public function delete($id)
    {

      if(Product::find($request->id)->product_image != 'product.jpg'){
      unlink("/uploads/product-image/".Product::find($request->id)->product_image);
      }
      Product::find($id)->forceDelete();
      return back()->with('del','Delete Successfully');

    }




}
