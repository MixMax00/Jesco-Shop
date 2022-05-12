@extends('admin.master')


@section('title')
  Edit Banner
@endsection

@section('linkItem')
  Edit Banner
@endsection


@section('admin')



  <div class="row">
    <div class="col-md-8 m-auto"><body>

    </body>
      <div class="card">
        <div class="card-header">
          <div class="card-title bg-orange">
            <h3 class="text-center text-dark">Banner Edit Form</h3>
          </div>
        </div>
        <div class="card-body">

          <form class="" action="{{ route('banner.updateBanner') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
              <label for="" class="label-control mb-2">Banner Title One</label>
              <input type="hidden" name="banner_id" value="{{ $edit_banner->id }}" class="form-control">
              <input type="text" name="banner_title_one" value="{{ $edit_banner->banner_title_one }}" class="form-control">
              @error('banner_title_one')
              <span class="text-danger mt-2">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="" class="label-control mb-2">Banner Title Two</label>
              <input type="text" name="banner_title_two" value="{{ $edit_banner->banner_title_two }}" class="form-control">
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
              <label for="" class="label-control mb-2">Privious Image</label>
              <img src="{{ asset('uploads/banner')}}/{{ $edit_banner->banner_img }}" alt="" width="220" height="100">
            </div>
            <div class="form-group mb-3">
              <input type="submit" name="btn" value="Update Banner" class="btn btn-primary btn-block w-100">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




@endsection
