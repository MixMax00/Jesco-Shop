@extends('admin.master')

@section('title')
  Add Category
@endsection

@section('linkItem')
  Add Category
@endsection


@section('admin')



  <div class="row">
    <div class="col-md-8 m-auto"><body>

    </body>
      <div class="card">
        <div class="card-header">
          <div class="card-title bg-orange">
            <h3 class="text-center text-dark">Category Add Form</h3>
          </div>
        </div>
        <div class="card-body">
          @if( session('insErr') )
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('insErr')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if( session('insDone') )
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('insDone')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <form class="" action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
              <label for="" class="label-control mb-2">Category Name</label>
              <input type="text" name="category_name" value="" class="form-control">
            </div>
            <div class="form-group mb-3">
              <input type="submit" name="btn" value="Add Category" class="btn btn-primary btn-block w-100">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




@endsection
