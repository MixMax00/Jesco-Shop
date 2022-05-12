@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Date</th>
                    </thead>
                    <tbody>
                      @foreach ($all_users as $user)

                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>{{ $user->created_at->format('d-m-y') }}</td>
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
