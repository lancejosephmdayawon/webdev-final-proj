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

            <div class="card-field mb-2">
                <label>Book Title</label>
                <input id="author" type="text" class="form-control" value="The Great Gatsby" readonly>
            </div>

            <div class="card-field mb-2">
                <label>Author</label>
                <input id="author" type="text" class="form-control" value="F.Scott Fitzgerald" readonly>
            </div>

            <div class="card-area mb-4">
                <label>Description <i>(Optional)</i></label>
                <textarea rows="4" class="form-control rounded-textarea" value="" readonly> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </textarea>
            </div>

            <hr class="my-2">

            <label class="font-extrabold" readonly>Student Information</label>

            <div class="card-field mb-2">
                <label>Name</label>
                <input id="name" type="text" class="form-control" readonly>
            </div>

            <div class="card-field mb-4">
                <label>LRN</label>
                <input id="title" type="text" class="form-control" readonly>
            </div>

            <hr class="my-2">

            <div class="card-field row mb-10">
                <div class="col-md-6">
                    <label>Date Borrowed</label>
                    <input id="date_borrowed" type="date" class="form-control" value="2026-01-10" readonly>
                </div>

                <div class="col-md-6">
                    <label>Date Returned</label>
                    <input id="date_return" type="date" class="form-control" readonly>
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
        // window.location = `/student/borrow-book/${bookId}`;
        window.location = "{{ url('student/borrow-book') }}/" + bookId;
    }
</script>
@endpush