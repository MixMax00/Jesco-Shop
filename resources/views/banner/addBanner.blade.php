@extends('admin.master')


@section('title')
  Add Banner
@endsection

@section('linkItem')
  Add Banner
@endsection


@section('admin')



  <div class="row">
    <div class="col-md-8 m-auto"><body>

    </body>
      <div class="card">
        <div class="card-header">
          <div class="card-title bg-orange">
            <h3 class="text-center text-dark">Banner Add Form</h3>
          </div>
        </div>
        <div class="card-body">

          @if(session('succ'))
           <h3 class="text-center text-success">{{ session('succ') }}</h3>
          @endif

          <form class="" action="{{ route('banner.storeBanner') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
              <label for="" class="label-control mb-2">Banner Title One</label>
              <input type="text" name="banner_title_one" value="" class="form-control">
              @error('banner_title_one')
              <span class="text-danger mt-2">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="" class="label-control mb-2">Banner Title Two</label>
              <input type="text" name="banner_title_two" value="" class="form-control">
              @error('banner_title_two')
              <span class="text-danger mt-2">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="" class="label-control mb-2">Banner Image</label>
              <input type="file" name="banner_img" value="" class="form-control">
              @error('banner_img')
              <span class="text-danger mt-2">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <input type="submit" name="btn" value="Add Banner" class="btn btn-primary btn-block w-100">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




@endsection
