@extends('admin.master')

@section('title')
  Edit Category
@endsection

@section('linkItem')
  Edit Category
@endsection


@section('admin')



  <div class="row">
    <div class="col-md-8 m-auto"><body>

    </body>
      <div class="card">
        <div class="card-header">
          <div class="card-title bg-orange">
            <h3 class="text-center text-dark">Edit Category</h3>
          </div>
        </div>
        <div class="card-body">
          @if( session('upDone') )
          <div class="alert alert-warning fade show" role="alert">
            <strong>{{ session('upDone')}}</strong>

          </div>
          @endif

          @if( session('allDone') )
          <div class="alert alert-warning  fade show" role="alert">
            <strong>{{ session('allDone')}}</strong>

          </div>
          @endif
          <form class="" action="{{ route('category.update') }}" method="post">
            @csrf
            <div class="form-group mb-3">
              <label for="" class="label-control mb-2">Category Name</label>
              <input type="hidden" name="category_id" value="{{ $category->id }}" class="form-control">
              <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control">
            </div>
            <div class="form-group mb-3">
              <input type="submit" name="btn" value="Update Category" class="btn btn-primary btn-block w-100">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




@endsection
