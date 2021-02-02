@extends('layouts.app')

@section('section')
{{-- <div class="text-primary">Register</div> --}}
{{-- register section --}}
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        @include('usersignup.header')

        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <img src={{asset("images/logo-shop.png")}} alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Create Account-MAuth</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    {{-- {{!! session('status') !!}} --}}
                                  
                                    <form class="form-horizontal form-simple" action="{{ route('register.mauth')}}"
                                        method="POST" novalidate>
                                        @csrf
                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input type="text"
                                                class="form-control form-control-lg input-lg @error('name') is-invalid @enderror"
                                                value="{{ old('name')}}" id="user-name" placeholder="User Name"
                                                name="name">
                                            <div class="form-control-position">
                                                <i class="la la-user"></i>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message}}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input type="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" id="user-email" placeholder="Your Email Address" required name="email" value="{{ old('email')}}">
                                            <div class="form-control-position">
                                                <i class="la la-envelope"></i>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message}}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input type="number" class="form-control form-control-lg input-lg @error('phone_no') is-invalid @enderror" id="user-phone_no" placeholder="Your Phone Number" required name="phone_no" value="{{ old('phone_no')}}">
                                            <div class="form-control-position">
                                                <i class="ft-phone"></i>
                                            </div>
                                            @error('phone_no')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message}}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control">
                                                    <option>User</option>
                                                    <option>Dress</option>
                                                    <option>Product</option>
                                                    <option>Admin</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password"
                                                class="form-control form-control-lg input-lg @error('password') is-invalid @enderror"
                                                id="user-password" placeholder="Enter Password" required
                                                name="password">
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message}}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-lg input-lg "
                                                id="confirm-password" placeholder="Confirm Password" required
                                                name="password_confirmation">
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>

                                        </fieldset>

                                        <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                                class="ft-unlock"></i> Register</button>
                                    </form>
                                </div>
                                <p class="text-center">Already have an account ? <a href="{{ url('/login')}}"
                                        class="card-link">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection