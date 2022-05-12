@extends('admin.master')


@section('title')
  View Banner
@endsection

@section('linkItem')
  View Banner
@endsection

@section('admin')



  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <h3 class="text-center text-dark">Product</h3>
          </div>
        </div>
        <div class="card-body">
          @if(session('succUp'))
           <h3 class="text-center text-success">{{ session('succUp') }}</h3>
          @endif

          <div class="col-md-12">
            <table class="table table-bordered">
              <tbody class="bg-primary text-white">
                <th>Sl</th>
                <th>Banner Title One</th>
                <th>Banner Title Two</th>
                <th>Banner Img</th>
                <th>Added By</th>
                <th>Created At</th>
                <th>Action</th>
              </tbody>
              <tbody>
                @foreach($all_banner as $banner)

                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $banner->banner_title_one }}</td>
                  <td>{{ $banner->banner_title_two }}</td>
                  <td>
                    <img src="{{ asset('uploads/banner')}}/{{ $banner->banner_img }}" alt="" width="200">
                  </td>
                  <td>{{ $banner->bannerTouser->name }}</td>
                  <td>{{ $banner->created_at->format('d-m-y') }}</td>
                  <td>
                    <a class="btn btn-sm btn-info" href="{{ route('banner.editBanner',['id' =>$banner->id]) }}" title="Edit Banner">
                      <span><i class="fa fa-edit"></i></span>
                    </a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
