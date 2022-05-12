<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontEndController;
use App\Http\Controllers\SubcategoryController;


Auth::routes();


Route::get('/home', [AdminController::class, 'index'])->name('home');




Route::get('/role', [RoleController::class, 'UserRole']);
Route::post('/role/role', [RoleController::class, 'StorRole']);


//category view
Route::prefix('category')->group(function(){
  Route::get('/addCategory', [CategoryController::class, 'create'])->name('category.addCategory');
  Route::post('/storeCategory', [CategoryController::class, 'store'])->name('category.store');
  Route::get('/storeEdit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
  Route::post('/storeUpdate', [CategoryController::class, 'update'])->name('category.update');
  Route::get('/viewCategory', [CategoryController::class, 'index'])->name('category.viewCategory');
  Route::get('/unPublised/{id}', [CategoryController::class, 'unPublised'])->name('category.unPublised');
  Route::get('/publised/{id}', [CategoryController::class, 'publised'])->name('category.publised');
  Route::get('/moveToTrashed/{id}', [CategoryController::class, 'destroy'])->name('category.moveToTrashed');
  Route::get('/trashedCategory', [CategoryController::class, 'trashedCategory'])->name('category.trashedCategory');
  Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
  Route::get('/vanish/{id}', [CategoryController::class, 'delete'])->name('category.vanish');

});

// Sub category
Route::prefix('subcategory')->group(function(){
  Route::get('/addSubCategory', [SubcategoryController::class, 'create'])->name('subcategory.addSubCategory');
  Route::post('/storeSubCategory', [SubcategoryController::class, 'store'])->name('subcategory.store');
  Route::get('/storeEdit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
  Route::post('/storeUpdate', [SubcategoryController::class, 'update'])->name('subcategory.update');
  Route::get('/viewSubCategory', [SubcategoryController::class, 'index'])->name('subcategory.viewSubCategory');
  Route::get('/unPublised/{id}', [SubcategoryController::class, 'unPublised'])->name('subcategory.unPublised');
  Route::get('/publised/{id}', [SubcategoryController::class, 'publised'])->name('subcategory.publised');
  Route::get('/moveToTrashed/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.moveToTrashed');
  Route::get('/trashedSubCategory', [SubcategoryController::class, 'trashedCategory'])->name('subcategory.trashedSubCategory');
  Route::get('/restore/{id}', [SubcategoryController::class, 'restore'])->name('subcategory.restore');
  Route::get('/vanish/{id}', [SubcategoryController::class, 'delete'])->name('subcategory.vanish');

});

//Product
Route::prefix('product')->group(function(){
  Route::get('/addProduct', [ProductController::class, 'create'])->name('product.addProduct');
  Route::post('/storeProduct', [ProductController::class, 'store'])->name('product.storeProduct');
  Route::get('/viewProduct', [ProductController::class, 'index'])->name('product.viewProduct');
  Route::get('/singleProduct/{id}', [ProductController::class, 'show'])->name('product.singleProduct');
  Route::get('/editProduct/{id}', [ProductController::class, 'edit'])->name('product.editProduct');
  route::post('/updateProduct', [ProductController::class, 'update'])->name('product.updateProduct');
  Route::get('/unPublised/{id}', [ProductController::class, 'unPublised'])->name('product.unPublised');
  Route::get('/publised/{id}', [ProductController::class, 'publised'])->name('product.publised');
  Route::get('/delete/{id}', [ProductController::class, 'tmp_delete'])->name('product.deleteProduct');
  Route::get('/trashedProduct', [ProductController::class, 'trash'])->name('product.manageTrashProduct');
  Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
  Route::get('/vanish/{id}', [ProductController::class, 'delete'])->name('product.vanish');
  Route::post('/getcategoryid',[ProductController::class, 'categoryId'])->name('subcategoryId');
});



//Banner Route Difinition
Route::prefix('banner')->group(function(){
    Route::get('/addBanner', [BannerController::class, 'create'])->name('banner.addBanner');
    Route::post('/storeBanner', [BannerController::class, 'store'])->name('banner.storeBanner');
    Route::get('/viewBanner', [BannerController::class, 'index'])->name('banner.viewBanner');
    Route::get('/editBanner/{id}', [BannerController::class, 'edit'])->name('banner.editBanner');
    Route::post('/updateBanner', [BannerController::class, 'update'])->name('banner.updateBanner');
});








//
// Route::get('/user/dashboard',function(){
//   return "hello";
// });



//fornt end view

Route::get('/', [frontEndController::class, 'frontEnd']);



// front-end products
Route::get('/product/single/{id}/{slug}',[frontEndController::class, 'singleProductView'])->name('product.single');


Route::post('/cart/addCart',[CartController::class, 'addCart'])->name('addCart');
Route::get('/cart/viewCart',[CartController::class, 'index'])->name('viewCart');
Route::get('/cart/deleteCart/{id}',[CartController::class, 'delete'])->name('delete');


Route::get('/test',[TestController::class, 'testRoute'])->name('test');
