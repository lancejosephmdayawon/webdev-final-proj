@extends('layouts.user-borrowreq')
@section('title', 'ISKO-LIB: Student Borrow Request')

@section('content')
<div class="main-container">
    <div class="inner-container">
        <div class="form-card">

            <div class="action-close">
                <button class="close-btn" onclick="closeBorrowedModal()">&times;</button>
            </div>

            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/book-borrow.png') }}" class="book-borrow-img mb-2">
                <h2 class="font-extrabold">Borrowed Book</h2>
            </div>

            {{-- BOOK INFO --}}
            <div class="card-field mb-2">
                <label>Book Title</label>
                <input type="text"
                    class="form-control"
                    value="{{ $borrowedBook->book->title }}"
                    readonly>
            </div>

            <div class="card-field mb-2">
                <label>Author</label>
                <input type="text"
                    class="form-control"
                    value="{{ $borrowedBook->book->author }}"
                    readonly>
            </div>

            <div class="card-area mb-4">
                <label>Description <i>(Optional)</i></label>
                <textarea rows="4"
                    class="form-control rounded-textarea"
                    readonly>{{ $borrowedBook->book->description }}</textarea>
            </div>

            <hr class="my-2">

            {{-- STUDENT INFO --}}
            <label class="font-extrabold">Student Information</label>

            <div class="card-field mb-2">
                <label>Name</label>
                <input type="text"
                    class="form-control"
                    value="{{ trim($borrowedBook->user->first_name . ' ' . $borrowedBook->user->middle_name . ' ' . $borrowedBook->user->last_name) }}"
                    readonly>
            </div>


            <div class="card-field mb-4">
                <label>LRN</label>
                <input type="text"
                    class="form-control"
                    value="{{ $borrowedBook->user->student_id ?? 'N/A' }}"
                    readonly>
            </div>

            <hr class="my-2">

            {{-- DATES --}}
            <div class="card-field row mb-10">
                <div class="col-md-6">
                    <label>Date Borrowed</label>
                    <input type="text"
                        class="form-control"
                        value="{{ \Carbon\Carbon::parse($borrowedBook->borrow_date)->format('F j, Y') }}"
                        readonly>
                </div>

                <div class="col-md-6">
                    <label>Expected Return</label>
                    <input type="text"
                        class="form-control"
                        value="{{ \Carbon\Carbon::parse($borrowedBook->return_date)->format('F j, Y') }}"
                        readonly>
                </div>
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
</script>
@endpush