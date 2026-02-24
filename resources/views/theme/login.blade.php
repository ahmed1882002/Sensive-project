@extends('master')
@section('title', 'Register')
<!--================ Hero sm banner start =================-->
<!--================ Hero sm banner end =================-->

<!-- ================ contact section start ================= -->
@section('content')
    @include('theme.partials.hero', ['title' => 'Login'])
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form action="{{ route('login') }}" class="form-contact contact_form" action="contact_process.php"
                        method="post" novalidate="novalidate">
                        @csrf
                        <div class="form-group">
                            <input class="form-control border" name="email" id="email" type="email"
                                placeholder="Enter email address" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="password" id="name" type="password"
                                placeholder="Enter your password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm w-100">Login</button>
                            <div class="mt-3">
                                <a href="{{ route('register') }}" class="text-secondary"
                                    style="font-size: 14px; text-decoration: none;">
                                    Don't have an account? <b>Register</b>
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
