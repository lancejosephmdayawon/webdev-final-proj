@extends('layouts.user-book-history')
@section('title', 'ISKO-LIB: User Book History')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="form-card">
            <div class="action-close">
                <button class="close-btn" onclick="closeBorrowedModal()">&times;</button>
            </div>

            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/book-history.png') }}" class="book-history-img mb-2">
                <h2 class="font-extrabold">Book Detail</h2>
            </div>

            {{-- Book Details --}}
            <div class="card-field mb-2">
                <label>Book Title</label>
                <input type="text" class="form-control" value="{{ $book->title }}" readonly>
            </div>

            <div class="card-field mb-2">
                <label>Author</label>
                <input type="text" class="form-control" value="{{ $book->author }}" readonly>
            </div>

            <div class="card-area mb-4">
                <label>Description <i>(Optional)</i></label>
                <textarea rows="4" class="form-control rounded-textarea" readonly>{{ $book->description }}</textarea>
            </div>

            <hr class="my-2">

            <label class="font-extrabold">Student Information</label>

            {{-- Assuming $history contains user borrow requests for this book --}}
            @php
                $lastBorrow = $history->first();
            @endphp

            <div class="card-field mb-2">
                <label>Name</label>
                <input type="text" class="form-control" value="{{ auth()->user()->first_name.' '.auth()->user()->middle_name.' '.auth()->user()->last_name }}" readonly>
            </div>

            <div class="card-field mb-4">
                <label>LRN</label>
                <input type="text" class="form-control" value="{{ auth()->user()->lrn }}" readonly>
            </div>

            <hr class="my-2">

            <div class="card-field row mb-10">
                <div class="col-md-6">
                    <label>Date Borrowed</label>
                    <input type="date" class="form-control" 
                        value="{{ optional($lastBorrow)->borrow_date }}" readonly>
                </div>

                <div class="col-md-6">
                    <label>Date Returned</label>
                    @php
                        $returnDate = optional($lastBorrow?->transaction?->returnLog)->date_returned;
                    @endphp
                    <input type="date" class="form-control" value="{{ $returnDate ?? '' }}" readonly>
                </div>
            </div>

            <div class="action-buttons">
                <button type="button" class="btn-save" onclick="openBorrowModal('{{ $book->id }}')">Borrow Again?</button>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function closeBorrowedModal() {
        window.location = "{{ route('user.books') }}";
    }

    function openBorrowModal(bookId) {
        window.location = "{{ url('student/borrow-book') }}/" + bookId;
    }
</script>
@endpush
