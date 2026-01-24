@extends('layouts.admin-borrowreq')
@section('title', 'ISKO-LIB: Librarian Unborrowed Book')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="form-card">

                <!-- Book Info Header -->
                <div class="book-info-card row justify-content-center text-center mb-4">
                    <img src="{{ asset('images/book-borrow.png') }}" class="book-borrow-img mb-2">
                    <h2 class="font-extrabold">Overdue book returned?</h2>
                </div>

                <!-- Book Info -->
                <div class="card-field mb-2">
                    <label>Book Title</label>
                    <input type="text" class="form-control" value="{{ $transaction->borrowRequest->book->title }}" readonly>
                </div>
                <div class="card-field mb-2">
                    <label>Author</label>
                    <input type="text" class="form-control" value="{{ $transaction->borrowRequest->book->author }}" readonly>
                </div>
                <div class="card-area mb-4">
                    <label>Description <i>(Optional)</i></label>
                    <textarea rows="4" class="form-control rounded-textarea" readonly>{{ $transaction->borrowRequest->book->description }}</textarea>
                </div>

                <hr class="my-2">

                <!-- Student Info -->
                <label class="font-extrabold">Student Information</label>
                <div class="card-field mb-2">
                    <label>Name</label>
                    <input type="text" class="form-control"
                        value="{{ $transaction->borrowRequest->user->first_name . ' ' . $transaction->borrowRequest->user->middle_name . ' ' . $transaction->borrowRequest->user->last_name }}" readonly>
                </div>
                <div class="card-field mb-4">
                    <label>LRN</label>
                    <input type="text" class="form-control" value="{{ $transaction->borrowRequest->user->student_id }}" readonly>
                </div>

                <hr class="my-2">

                <!-- Borrow Dates -->
                <div class="card-field row mb-10">
                    <div class="col-md-4">
                        <label>Borrow Date</label>
                        <input type="text" class="form-control"
                            value="{{ $transaction->borrowRequest->borrow_date?->format('F j, Y') }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label>Expected Return</label>
                        <input type="text" class="form-control"
                            value="{{ $transaction->borrowRequest->return_date?->format('F j, Y') }}" readonly>
                    </div>

                    @php
                    $daysOverdue = 0;

                    if ($transaction->borrowRequest->return_date) {

                    // Convert to seconds
                    $return = strtotime($transaction->borrowRequest->return_date);
                    $now = strtotime(date('Y-m-d'));
                    $diff = $now - $return;
                    $daysOverdue = $diff > 0 ? floor($diff / 86400) : 0; // 86400 seconds in a day
                    }
                    @endphp

                    <div class="col-md-4">
                        <label>Days Overdue</label>
                        <input type="text" class="form-control bg-red-300 font-semibold"
                            value="{{ $daysOverdue }} {{ $daysOverdue < 2 ? 'day' : 'days' }}" readonly>
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button type="button" class="btn-save" onclick="openReturnModal('{{ $transaction->id }}')">Returned</button>
                    <button type="button" class="btn-cancel" onclick="closeBorrowedModal()">Cancel</button>
                </div>

            </div>
        </div>

    </div>
</div>

@include('modals.admin-return-confirm')
@include('modals.admin-return-success')

@push('scripts')
<script>
    function openReturnModal(transactionId) {
        const modal = document.getElementById('adminReturnConModal');
        modal.style.display = 'flex';
        modal.dataset.transactionId = transactionId; // store ID for confirm action
    }

    function closeBorrowedModal() {
        window.location = "{{ route('admin.transaction') }}";
    }
</script>
@endpush

@endsection