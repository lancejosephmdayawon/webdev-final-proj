@extends('layouts.lay-welcome')
@section('title', 'Welcome to ISKO-LIB!')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="min-h-screen">
    <div class="page-wrapper">
        <div class="login-form">

            <div class="log-header mb-4">
                <img src="{{ asset('images/PUPLogo.png') }}" class="pup-logo-log">
                <h1 class="text-4xl font-extrabold">ISKO-LIB</h1>
            </div>


            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <!-- EMAIL -->
                <div class="form-input-group mb-3">
                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email') }}"
                        required />
                </div>

                <!-- PASSWORD -->
                <div class="form-input-group mb-4 password-group">
                    <input id="password" type="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>

                <p class='text-xs md:text-sm text-white'>
                    By logging in, you agree to the institution's 
                    <a href='https://www.pup.edu.ph/terms/' class="text-yellow-300 underline">Terms of Service</a>, and
                    <a href='https://www.pup.edu.ph/privacy/' class="text-yellow-300 underline">Privacy Policy</a>, 
                    and acknowledge that unauthorized access is prohibited and activities may be monitored.
                </p>

                <!-- ERROR & SUCCESS MESSAGES -->
                @if ($errors->any())
                <div id="error-msg" class="mt-6 alert-float bg-red-100 text-red-700 rounded-lg shadow-lg max-w max-h flex items-center justify-center">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div id="success-msg" class="mt-6 alert-float bg-green-100 text-green-700 rounded-lg shadow-lg max-w max-h flex items-center justify-center">
                    {{ session('success') }}
                </div>
                @endif

                <!-- LOGIN BUTTON -->
                <button type="submit" class="login-btn w-full">
                    LOGIN
                </button>
            </form>
        </div>
    </div>
</div>

<!-- AUTO HIDE ALERT MESSAGES -->
<script>

    // For password hide or show
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.querySelector('.password-toggle i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtn.classList.remove('fa-eye');
            toggleBtn.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleBtn.classList.remove('fa-eye-slash');
            toggleBtn.classList.add('fa-eye');
        }
    }

    // For Error & Success Messages to be hiddenn after 5 seconds
    setTimeout(() => {
        const errorMsg = document.getElementById('error-msg');
        if (errorMsg) {
            errorMsg.style.display = 'none';
        }

        const successMsg = document.getElementById('success-msg');
        if (successMsg) {
            successMsg.style.display = 'none';
        }
    }, 5000); // hides after 5 seconds
</script>
@endsection