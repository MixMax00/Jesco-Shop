@extends('admin.master')

@section('title')
  View Sub Category
@endsection

@section('linkItem')
  View Category
@endsection



@section('admin')


  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <h3 class="text-center text-dark">Sub Category</h3>
          </div>
        </div>
        <div class="card-body">
          @if( session('errstore') )
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('errstore')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          @if( session('errUnpub') )
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('errUnpub')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          @if( session('errTras') )
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('errTras')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div class="col-md-12">
            <table class="table table-bordered">
              <tbody class="bg-primary text-white">
                <th>Sl</th>
                <th>Category</th>
                <th>Sub Category Name</th>
                <th>Status</th>
                <th>Added By</th>
                <th>Created At</th>
                <th>Action</th>
              </tbody>
              <tbody>
                @foreach($sub_categories as $subcategory)

                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $subcategory->subcategoryToCategory->category_name }}</td>
                  <td>{{ $subcategory->sub_category_name }}</td>
                  <td>
                    @if($subcategory->status == 1)
                      <span class="badge rounded-pill bg-primary">Active</span>
                    @else
                      <span class="badge rounded-pill bg-warning">Deactive</span>
                    @endif

                  </td>
                  <td>{{ $subcategory->subcategoryTouser->name }}</td>
                  <td>{{ $subcategory->created_at->format('d-m-y') }}</td>
                  <td>
                      @if($subcategory->status == 1)
                      <a href="{{ route('subcategory.unPublised', ['id'=>$subcategory->id]) }}" class="btn btn-primary btn-sm">
                          <span><i class="fa fa-arrow-up"></i></span>
                      </a>
                      @else
                      <a href="{{ route('subcategory.publised', ['id'=>$subcategory->id]) }}" class="btn btn-warning btn-sm">
                          <span><i class="fa fa-arrow-down"></i></span>
                      </a>
                      @endif
                      <a href="{{ route('subcategory.edit', ['id'=>$subcategory->id]) }}" class="btn btn-info btn-sm">
                        <span><i class="fa fa-edit"></i></span>
                      </a>
                      <a href="{{ route('subcategory.moveToTrashed', ['id'=>$subcategory->id]) }}" class="btn btn-danger btn-sm">
                        <span><i class="fa fa-trash" aria-hidden="true"></i></span>
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
