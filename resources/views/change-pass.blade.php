@extends('layouts.lay-welcome')
@section('title', 'Change Password')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .action-close {
        display: flex;
        justify-content: flex-start;
    }

    .close-btn {
        background: transparent;
        border: none;
        font-size: 14px;
        cursor: pointer;
        color: white;
    }

    .password-group {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
    }

    .text-error {
        color: red;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>

<div class="page-wrapper">
    <div class="changepass-form">
        <div class="action-close">
            <button class="close-btn mb-4" onclick="closeChangePassModal()">← Back</button>
        </div>

        <div class="log-header mb-4">
            <img src="{{ asset('images/PUPLogo.png') }}" class="pup-logo-log">
            <h1 class="text-4xl font-extrabold">ISKO-LIB</h1>
        </div>

        <form method="POST" action="{{ route('change-pass.update') }}">
            @csrf
            @method('PUT')

            <!-- OLD PASSWORD -->
            <div class="form-input-group mb-2 password-group">
                <input id="current_password" type="password" name="current_password" placeholder="Old Password" required>
                <button type="button" class="password-toggle" onclick="togglePassword('current_password', this)">
                    <i class="fa fa-eye"></i>
                </button>
            </div>

            <!-- NEW PASSWORD -->
            <div class="form-input-group mb-2 password-group">
                <input id="new_password" type="password" name="new_password" placeholder="New Password" required>
                <button type="button" class="password-toggle" onclick="togglePassword('new_password', this)">
                    <i class="fa fa-eye"></i>
                </button>
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="form-input-group mb-2 password-group">
                <input id="new_password_confirmation" type="password" name="new_password_confirmation" placeholder="Confirm Password" required>
                <button type="button" class="password-toggle" onclick="togglePassword('new_password_confirmation', this)">
                    <i class="fa fa-eye"></i>
                </button>
            </div>

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

            <!-- SAVE BUTTON -->
            <div class="action-btn">
                <button type="submit" class="login-btn w-full">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    function closeChangePassModal() {
        if (document.referrer && document.referrer.includes(window.location.host)) {
            window.history.back();
        } else {
            window.location.href = '{{ route("user.profile") }}';
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
@endpush