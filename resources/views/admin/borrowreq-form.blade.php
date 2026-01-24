@extends('layouts.admin-borrowreq')
@section('title', 'ISKO-LIB: Librarian Borrow Request')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="form-card">

                <!-- Close Button -->
                <div class="action-close">
                    <button class="close-btn" onclick="closeRequestModal()">&times;</button>
                </div>

                <!-- Book Info Header -->
                <div class="book-info-card row justify-content-center text-center mb-4">
                    <img src="{{ asset('images/book-borrow.png') }}" class="book-borrow-img mb-2">
                    <h2 class="font-extrabold">Borrow Request</h2>
                </div>

                <!-- Book Info -->
                <div class="card-field mb-2">
                    <label>Book Title</label>
                    <input type="text" class="form-control" value="{{ $borrowRequest->book->title }}" readonly>
                </div>
                <div class="card-field mb-2">
                    <label>Author</label>
                    <input type="text" class="form-control" value="{{ $borrowRequest->book->author }}" readonly>
                </div>
                <div class="card-area mb-4">
                    <label>Description <i>(Optional)</i></label>
                    <textarea rows="4" class="form-control rounded-textarea" readonly>{{ $borrowRequest->book->description }}</textarea>
                </div>

                <hr class="my-2">

                <!-- Student Info -->
                <label class="font-extrabold">Student Information</label>
                <div class="card-field mb-2">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ $borrowRequest->user->first_name . ' ' . $borrowRequest->user->middle_name . ' ' . $borrowRequest->user->last_name }}" readonly>
                </div>
                <div class="card-field mb-4">
                    <label>LRN</label>
                    <input type="text" class="form-control" value="{{ $borrowRequest->user->student_id }}" readonly>
                </div>

                <hr class="my-2">

                <!-- Borrow Dates -->
                <div class="card-field row mb-10">
                    <div class="col-md-6">
                        <label>Borrow Date</label>
                        <input type="text" class="form-control"
                            value="{{ $borrowRequest->borrow_date?->format('F j, Y') }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Expected Return</label>
                        <input type="text" class="form-control"
                            value="{{ $borrowRequest->return_date?->format('F j, Y') }}" readonly>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button type="button" class="btn-save" onclick="acceptRequestModal('{{ $borrowRequest->id }}')">Accept</button>
                    <button type="button" class="btn-cancel" onclick="declineRequestModal('{{ $borrowRequest->id }}')">Decline</button>
                </div>

            </div>
        </div>

    </div>
</div>

{{-- Include Modals from modals folder --}}
@include('modals.admin-accept-confirm')
@include('modals.admin-accept-success')

{{-- Scripts --}}
<script>
    function closeRequestModal() {
        window.location = "{{ route('admin.transaction') }}";
    }

    function acceptRequestModal(requestId) {
        const modal = document.getElementById('adminAcceptConModal');
        modal.style.display = 'flex';
        modal.dataset.requestId = requestId; // store request ID for confirmation
    }

    function declineRequestModal(requestId) {
        const modal = document.getElementById('adminDeclineConModal');
        modal.dataset.requestId = requestId; // store request ID for confirmation
        modal.style.display = 'flex';
    }

    // For Accepting Borrow Requests
    function confirmAcc() {
        const requestId = document.getElementById('adminAcceptConModal').dataset.requestId;

        fetch(`/librarian/borrow-request/${requestId}/approve`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('adminAcceptConModal').style.display = 'none';
                    document.getElementById('adminAcceptSuccessModal').style.display = 'flex';
                }
            })
            .catch(err => console.error(err));
    }

    // For Declining Borrow Requests
    function confirmDec() {
        const modal = document.getElementById('adminDeclineConModal');
        const requestId = modal.dataset.requestId;

        if (!requestId) {
            alert("Request ID not found!");
            return;
        }

        fetch(`/librarian/borrow-request/${requestId}/decline`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    modal.style.display = 'none';
                    document.getElementById('adminDeclineSuccessModal').style.display = 'flex';
                } else {
                    alert(data.message || "Failed to decline request.");
                }
            })
            .catch(err => console.error(err));
    }

    function closeConfirmAccModal() {
        document.getElementById('adminAcceptConModal').style.display = 'none';
    }

    function closeSuccessAccModal() {
        window.location = "{{ route('admin.transaction') }}";
    }
</script>

@endsection