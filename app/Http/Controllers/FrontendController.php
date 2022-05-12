<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Categors;
use App\Models\Product;
use Cart;

class FrontendController extends Controller
{
  public function frontEnd(){
      $cartView = Cart::getContent();
      $all_product = Product::all();
      $all_category = Categors::all();

      return view('front-end.home.home',[
        'all_category' => $all_category,
        'all_product' => $all_product,
      ]);
  }

  public function singleProductView($id,$slug)
  {
    $product_detail = Product::find($id);
    $reletedProduct =Product::where('category_id',$id)->get();
    return view('front-end.product.single',[
      'product_detail'=>$product_detail,
      'reletedProducts'=>$reletedProduct,
    ]);
  }
}
