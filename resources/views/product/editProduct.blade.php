@extends('admin.master')

@section('title')
  Edit Product
@endsection

@section('linkItem')
    Edit Product
@endsection


@section('admin')



  <div class="row">
    <div class="col-md-12"><body>

    </body>
      <div class="card">
        <div class="card-header bg-primary">
          <div class="card-title ">
            <h3 class="text-center text-light">Product Add Form</h3>
          </div>
        </div>
        <div class="card-body">
          @if( session('prdSucc') )
          <div class="alert fade show">
            <strong class="text-center">{{ session('prdSucc')}}</strong>
          </div>
          @endif

          <form class="" action="{{ route('product.updateProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <input type="hidden" name="id" value="{{ $products->id }}" class="form-control">
                  <label for="" class="form-label mb-2">Category Name</label>
                  <select class="form-control" name="category_id">
                    <option value="{{ $products->productTocategory->id }}">{{ $products->productTocategory->category_name }}</option>
                    @foreach($categores as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Sub Category Name</label>
                  <select class="form-control" name="subcategory_id">
                    <option value="{{ $products->productToSubcategory->id}}">{{ $products->productToSubcategory->sub_category_name }}</option>
                    @foreach($subcategores as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
                    @endforeach
                  </select>
                  @error('subcategory_id')
                  <span class="text-center text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Product Name</label>
                  <input type="text" name="product_name" value="{{ $products->product_name }}" class="form-control">
                  @error('product_name')
                  <span class="text-center text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Old Price</label>
                  <input type="number" name="old_price" value="{{ $products->old_price }}" class="form-control">
                  @error('old_price')
                  <span class="text-center text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">New Price</label>
                  <input type="number" name="new_price" value="{{ $products->new_price }}" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Weight</label>
                  <input type="text" name="weight" value="{{ $products->weight }}" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Dimensions</label>
                  <input type="text" name="dimensions" value="{{ $products->dimensions }}" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Materials</label>
                  <input type="text" name="materials" value="{{ $products->materials }}" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Other Info</label>
                  <input type="text" name="other_info" value="{{ $products->other_info }}" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Short Description</label>
                  <textarea name="short_description" class="form-control">{{ $products->short_description }}</textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Long Description</label>
                  <textarea name="long_description" class="form-control">{{ $products->long_description }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                      <div class="form-group mb-3">
                          <label for="" class="form-label mb-2">Product Image</label>
                          <input type="file" name="product_image" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <img src="{{ asset('uploads/product-image')}}/{{ $products->product_image }}" alt="img" width="100">
                    </div>
                </div>



              </div>
            </div>
            <div class="form-group mb-3">
              <input type="submit" name="btn" value="Edit Product" class="btn btn-primary btn-block w-100">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!--
  <div class="row">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
    </div>
  </div> -->

@endsection
