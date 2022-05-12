@extends('admin.master')
@section('title')

Single Product View

@endsection

@section('linkItem')

Single Product View
@endsection

@section('admin')

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="text-center">Product Details</h3>
        </div>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-lg-6">
            <img src="{{ asset('uploads/product-image')}}/{{ $single_product->product_image }}" alt="" class="img-fluid">
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-12">
                <h3>{{ $single_product->product_name }}</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <strong>New Price : </strong><span>{{ $single_product->new_price }}</span>
              </div>
              <div class="col-md-6">
                <strong>Old Price : </strong><span>{{ $single_product->old_price}}</span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3 mt-3">
                <h5 class="text-primary">Short Description</h5>
                <p>{{ $single_product->short_description }}</p>
              </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                  <strong>Category : </strong><span>{{ $single_product->category_id }}</span>
                </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <strong>Subcategory : </strong><span>{{ $single_product->subcategory_id }}</span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <strong>SKU : </strong><span>{{ $single_product->sku}}</span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <strong>Slug : </strong><span>{{ $single_product->slug }}</span>
              </div>


            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Information</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Description</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Added By</a>
              </div>
            </nav>
            <div class="tab-content mt-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <div class="row mb-3">
                    <div class="col-md-12">
                      <strong>Weight : </strong><span>{{ $single_product->weight }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <strong>Dimensions : </strong><span>{{ $single_product->dimensions}}</span>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <strong>Materials : </strong><span>{{ $single_product->materials }}</span>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <strong>Other Info : </strong><span>{{ $single_product->other_info}}</span>
                  </div>


                </div>


              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">{{ $single_product->long_description}}</div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                <div class="row mb-3">
                    <div class="col-md-12">
                      <strong>Added : </strong><span>{{ $single_product->Added_by}}</span>
                    </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <strong>Created At : </strong><span>{{ $single_product->created_at->format('d-m-y')}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>



@endsection
