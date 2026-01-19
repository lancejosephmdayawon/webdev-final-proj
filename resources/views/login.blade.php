@extends('layouts.lay-welcome')
@section('title', 'Welcome to ISKO-LIB!')
@section('content')

<div class="min-h-screen">
    <div class="page-wrapper">
        <div class="login-form">

            <div class="log-header mb-4">
                <img src="{{ asset('images/PUPLogo.png') }}" class="pup-logo-log">
                <h1 class="text-4xl font-extrabold">ISKO-LIB</h1>
            </div>


            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <!-- ERROR & SUCCESS MESSAGES -->
                @if ($errors->any())
                <div
                    id="error-msg"
                    class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div
                    id="success-msg"
                    class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
                @endif

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
                <div class="form-input-group mb-2">
                    <input id="password" type="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                </div>

                <!-- FORGOT PASSWORD -->
                <div class="forgot-link mb-20">
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

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