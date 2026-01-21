@extends('layouts.user-borrow-form')
@section('title', 'ISKO-LIB: Student Borrow Book')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="form-card">
            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/book-borrow.png') }}" class="book-borrow-img mb-2">
                <h2 class="font-extrabold">Borrow a Book</h2>
            </div>

            <div class="card-field-categ mb-2">
                <label>Book Title</label>
                <select id="category" class="form-select">
                    <option selected disabled>Select a Book</option>
                    <option>The Great Gatsby</option>
                    <option>The Great Gatsby</option>
                    <option>The Great Gatsby</option>
                    <option>The Great Gatsby</option>
                    <option>The Great Gatsby</option>
                </select>
            </div>

            <div class="card-field mb-2">
                <label>Author</label>
                <input id="author" type="text" class="form-control" value="F.Scott Fitzgerald" readonly>
            </div>

            <div class="card-area mb-4">
                <label>Description</label>
                <textarea rows="4" class="form-control rounded-textarea" value="" readonly>
                </textarea>
            </div>

            <hr class="my-2">

            <label class="font-extrabold">Student Information</label>

            <div class="card-field mb-2">
                <label>Name</label>
                <input id="name" type="text" class="form-control">
            </div>

            <div class="card-field mb-4">
                <label>LRN</label>
                <input id="title" type="text" class="form-control">
            </div>

            <hr class="my-2">

            <div class="card-field row mb-10">
                <div class="col-md-6">
                    <label>Date Borrowed</label>
                    <input id="date_borrowed" type="date" class="form-control" value="2026-01-10" readonly>
                </div>

                <div class="col-md-6">
                    <label>Expected Return</label>
                    <input id="date_return" type="date" class="form-control">
                </div>
            </div>

            <div class="action-buttons">
                <button type="button" class="btn-save" onclick="openBookFormModal()">Submit</button>
                <button type="button" class="btn-cancel" onclick="closeBookFormModal(this)">Cancel</button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openBookFormModal(button) {
        const modal = document.getElementById('userBorrowFormConModal');
        modal.style.display = 'flex';
    }

    function closeBookFormModal() {
        window.location = "{{ route('user.books') }}";
    }
</script>
@endpush