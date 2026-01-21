@extends('layouts.lay-welcome')
@section('title', 'Welcome to ISKO-LIB!')
@section('content')

<div class="page-wrapper">
    <div class="login-form">
        <div class="log-header mb-4">
            <img src="{{ asset('images/PUPLogo.png') }}" class="pup-logo-log">
            <h1 class="text-4xl font-extrabold">ISKO-LIB</h1>
        </div>

        <form method="POST" action="#">
            @csrf
            <div class="form-content mb-0">
                <!-- EMAIL -->
                <div class="form-input-group mb-2">
                    <input id="email" type="email" name="email" placeholder="Email" required>
                </div>

                <!-- PASSWORD -->
                <div class="form-input-group mb-2">
                    <input id="password" type="password" name="password" placeholder="Password" required>
                </div>

                <!-- FORGOT PASSWORD -->
                <div class="forgot-link mb-8">
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>
            </div>

            <!-- LOGIN BUTTON -->
            <div class="action-btn">
                <button type="submit" class="login-btn w-full">
                    LOGIN
                </button>
            </div>
        </form>
    </div>
</div>

@endsection