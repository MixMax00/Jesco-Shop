@extends('layouts.app')



@section('content')


<div class="container">
  <div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
              <div class="card-title">
                 <h3>Add User Role</h3>
              </div>
            </div>
            <div class="card-body">

              @if(session('insErr'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ session('insErr')}}</strong> 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              @endif
              <form class="" action="{{ url('/role/role') }}" method="post">
                @csrf
                 <div class="mb-3 row">
                  <div class="col-md-12">
                     <input type="text" name="role" value="" class="form-control">
                     @error('role')

                      <small class="text-warning">{{ $message }}</small>
                     @enderror
                  </div>
                 </div>
                 <div class="mb-3 row">
                  <div class="col-md-12">
                     <input type="submit" name="btn" value="ADD ROLE" class="btn btn-primary w-100">
                  </div>
                 </div>
              </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
      <div class="card">
          <div class="card-header">
            <div class="card-title">
               <h3>View User Role</h3>
            </div>
          </div>
          <div class="card-body">
              <table class="table table-bordered">
                  <thead>
                     <th>Sl</th>
                     <th>Role</th>
                     <th>Status</th>
                     <th>Create At</th>
                     <th>action</th>
                  </thead>
                  <tbody>

                  @forelse($all_role as $role)
                    <tr>
                      <td>{{ $loop->index + 1}}</td>
                      <td>{{ $role->name }}</td>
                      <td>{{ $role->status }}</td>
                      <td>{{ $role->created_at->diffForHumans() }}</td>
                      <td></td>
                    </tr>

                    @empty
                    <tr>
                      <td class="text-warning text-center" colspan="6">No Data Addat</td>
                    </tr>
                   @endforelse
                  </tbody>
              </table>
          </div>
    </div>

  </div>

</div>





@endsection
