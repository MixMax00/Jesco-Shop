@extends('admin.master')

@section('title')
  Add Product
@endsection

@section('linkItem')
    Add Product
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
          @if( session('sccInsert') )
          <div class="alert fade show">
            <strong class="text-center">{{ session('sccInsert')}}</strong>
          </div>
          @endif

          <form class="" action="{{ route('product.storeProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Category Name</label>
                  <select class="form-control" name="category_id" id="catId">
                    <option value="">-----Select a Category------</option>
                    @foreach($categores as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Sub Category Name</label>
                  <select class="form-control" name="subcategory_id" id="subCatId">
                    <option value="">-----Select a Sub Category------</option>
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
                  <input type="text" name="product_name" value="" class="form-control">
                  @error('product_name')
                  <span class="text-center text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Old Price</label>
                  <input type="number" name="old_price" value="" class="form-control">
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
                  <input type="number" name="new_price" value="" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Weight</label>
                  <input type="text" name="weight" value="" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Dimensions</label>
                  <input type="text" name="dimensions" value="" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Materials</label>
                  <input type="text" name="materials" value="" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Other Info</label>
                  <input type="text" name="other_info" value="" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Short Description</label>
                  <textarea name="short_description" class="form-control"></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="" class="form-label mb-2">Long Description</label>
                  <textarea name="long_description" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="" class="form-label mb-2">Product Image</label>
                    <input type="file" name="product_image" value="" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <input type="submit" name="btn" value="Add Product" class="btn btn-primary btn-block w-100">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



@endsection



@section('footer_script')


  <script type="text/javascript">
    $(document).ready(function() {
      $('#catId').select2();
      $('#catId').change(function(){
        var catId = $(this).val();
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
       $.ajax({
          type   : 'POST',
          url: "{{ route('subcategoryId') }}",
          data   : {cat_id:catId},
          success: function(data){
            $('#subCatId').html(data);
          }
        });

      });
    });



  </script>


@endsection
