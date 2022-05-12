<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{



  public function addCart(Request $request){
    $cartId = Product::find($request->id);
    Cart::add([
      'id' => $cartId->id,
      'name' => $cartId->product_name,
      'price' => $cartId->old_price,
      'quantity' => $request->qty,
      'attributes' =>[
        'image' =>$cartId->product_image,
      ],


    ]);


  }

  public function index()
  {
    $cart_item = Cart::getContent();
    return view('front-end.cart.viewCart',[
      'cart_item' => $cart_item,
    ]);
  }
  public function delete($rowId){
    Cart::remove($rowId);
    return redirect('/cart/viewCart');
  }

}
