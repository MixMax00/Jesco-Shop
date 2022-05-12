@extends('admin.master')


@section('admin')

<div class="row mt-5">
       <div class="card m-auto">
           <div class="card-header text-center"><a href=""><img class="logo-img" src="{{ asset('admin')}}/assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
           <div class="card-body">
               <form action="{{ route('login') }}" method="post">
                 @csrf
                   <div class="form-group">
                       <input class="form-control form-control-lg  @error('email') is-invalid @enderror"  type="text" name="email" value="{{ old('email') }}" placeholder="User Email" autocomplete="off">
                       @error('email')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <input class="form-control form-control-lg @error('password') is-invalid @enderror"  name="password" type="password" placeholder="Password">
                       @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label class="custom-control custom-checkbox">
                           <input class="custom-control-input" type="checkbox" {{ old('remember') ? 'checked' : '' }}><span class="custom-control-label">Remember Me</span>
                       </label>
                   </div>
                   <button type="submit" class="btn btn-primary btn-lg btn-block">Sing In
                      </button>
               </form>
           </div>
           <div class="card-footer bg-white p-0  ">
               <div class="card-footer-item card-footer-item-bordered">
                   <a href="#" class="footer-link">Create An Account</a></div>
               <div class="card-footer-item card-footer-item-bordered">
                 @if (Route::has('password.request'))
                    <a class="footer-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
               </div>
           </div>
       </div>
   </div>


   @endsection
