@extends('master')
@section('title', 'Register')
<!--================ Hero sm banner start =================-->
<!--================ Hero sm banner end =================-->

<!-- ================ contact section start ================= -->
@section('content')
    @include('theme.partials.hero', ['title' => 'Register'])
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('register') }}/" class="form-contact contact_form" action="contact_process.php"
                        method="post" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border" name="name" id="name"
                                        type="text"value="{{ old('name') }}" placeholder="Enter your name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control border" name="email" id="email" type="email"
                                        value="{{ old('email') }}" placeholder="Enter email address">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border" name="password" id="name" type="password"
                                        placeholder="Enter your password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control border" name="password_confirmation" type="password"
                                        placeholder="Enter your password confirmation">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <div class="form-group mt-3 text-center">
                                <button type="submit"
                                    class="button button--active button-contactForm w-100">Register</button>

                                <div class="mt-3">
                                    <a href="{{ route('login') }}" class="text-secondary"
                                        style="font-size: 14px; text-decoration: none;">
                                        Already have an account? <b>Login</b>
                                    </a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- ================ contact section end ================= -->
