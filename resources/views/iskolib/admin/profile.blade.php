@extends('layouts.admin-profile')
@section('title', 'ISKO-LIB: Librarian Profile')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="form-card">
            <div class="action-close">
                <button class="close-btn" onclick="closeBorrowedModal()">&times;</button>
            </div>

            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/librarian-pfp.png') }}" class="librarian-pfp-img mb-2">
                <h2 class="font-extrabold">Librarian Profile</h2>
            </div>

            <div class="card-field mb-2">
                <label>Name</label>
                <input id="name" type="text" class="form-control" value="Dela Cruz, Juan D." readonly>
            </div>

            <div class="card-field mb-10">
                <label>Email</label>
                <input id="email" type="text" class="form-control" value="juandelacruz@gmail.com" readonly>
            </div>

            <div class="action-buttons">
                <button type="button" class="btn-changepass" onclick="openChangePass()">Change Password</button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function closeBorrowedModal() {
        window.location = "{{ route('admin.dashboard') }}";
    }

    function openChangePass() {
        window.location = "{{ route('change-pass') }}";
    }
</script>
@endpush