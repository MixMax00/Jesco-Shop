@extends('admin.master')

@section('title')
  Delete
@endsection

@section('linkItem')
  Delete
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
          @if( session('errpub') )
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('errpub')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div class="col-md-12">
            <table class="table table-bordered">
              <tbody class="bg-primary text-white">
                <th>Sl</th>
                <th>Category Name</th>
                <th>Delete By</th>
                <th>Deleted At</th>
                <th>Action</th>
              </tbody>
              <tbody>
                @foreach($sub_categories as $subcategory)

                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $subcategory->sub_category_name }}</td>

                  <td>{{ $subcategory->subcategoryTouser->name }}</td>
                  <td>{{ $subcategory->deleted_at }}</td>
                  <td>
                      <a href="{{ route('subcategory.restore', ['id'=>$subcategory->id]) }}" class="btn btn-danger btn-sm">
                        <span><i class="fa fa-home" aria-hidden="true"></i></span>
                      </a>
                      <a href="{{ route('subcategory.vanish', ['id'=>$subcategory->id])}}" class="btn btn-danger btn-sm">
                        <span><i class="fa fa-eraser" aria-hidden="true"></i></span>
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
