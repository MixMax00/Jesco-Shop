@extends('admin.master')

@section('title')
  View Product
@endsection

@section('linkItem')
  View Product
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
          @if( session('sccUpdate') )
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('sccUpdate')}}</strong>
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
                <th>Product Name</th>
                <th>Product Img</th>
                <th>Added By</th>
                <th>Created At</th>
                <th>Action</th>
              </tbody>
              <tbody>
                @foreach($all_product as $product)

                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>
                    <img src="{{ asset('uploads/product-image')}}/{{ $product->product_image }}" alt="" width="100">
                  </td>
                  <td>{{ $product->productTouser->name }}</td>
                  <td>{{ $product->created_at->format('d-m-y') }}</td>
                  <td>
                    <a href="{{ route('product.restore', ['id'=>$product->id]) }}" class="btn btn-info btn-sm">
                      <span><i class="fa fa-folder"></i></span>
                    </a>
                    <a href="{{ route('product.deleteProduct', ['id'=>$product->id]) }}" class="btn btn-danger btn-sm">
                      <span><i class="fa fa-trash"></i></span>
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
