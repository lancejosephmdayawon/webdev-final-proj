@extends('layouts.admin-profile')
@section('title', 'ISKO-LIB: Admin Profile')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="form-card">
                <div class="action-close">
                    <button class="close-btn" onclick="closeProfileModal()">&times;</button>
                </div>

                <div class="book-info-card row justify-content-center text-center mb-4">
                    <img src="{{ asset(Auth::user()->profile_picture ?? 'images/student-pfp.png') }}" class="student-pfp-img mb-2">
                    <h2 class="font-extrabold">Admin Profile</h2>
                </div>

                <div class="card-field mb-2">
                    <label>Name</label>
                    <input
                        id="name"
                        type="text"
                        class="form-control"
                        value="{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}"
                        readonly>
                </div>


                <div class="card-field mb-10">
                    <label>Email</label>
                    <input id="email" type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                </div>

                <div class="action-buttons">
                    <button type="button" class="btn-changepass" onclick="openChangePass()">Change Password</button>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    function closeProfileModal() {
        window.location = "{{ route('admin.dashboard') }}";
    }

    function openChangePass() {
        window.location = "{{ route('change-pass') }}";
    }
</script>
@endpush