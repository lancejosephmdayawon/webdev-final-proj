@extends('layouts.user-book-details')
@section('title', 'ISKO-LIB: Student Book Details')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="form-card">

            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/book-details.png') }}" class="book-details-img mb-2">
                <h2 class="font-extrabold">Book Details</h2>
            </div>

            <div class="card-field mb-2">
                <label>ISBN</label>
                <input id="name" type="text" class="form-control" value="978-0743273565" readonly>
            </div>

            <div class="card-field mb-2">
                <label>Book Title</label>
                <input id="title" type="text" class="form-control" value="The Great Gatsby" readonly>
            </div>

            <div class="card-field mb-2">
                <label>Author</label>
                <input id="author" type="text" class="form-control" value="F.Scott Fitzgerald" readonly>
            </div>

            <div class="card-field-categ mb-2">
                <label>Category</label>
                <select id="category" class="form-select" readonly>
                    <option selected disabled>Select a Category</option>
                    <option>Science & Technology</option>
                    <option>Literature</option>
                    <option>Social Studies</option>
                    <option>Economics</option>
                    <option>History</option>
                    <option>Philosophy</option>
                </select>
            </div>

            <div class="card-field mb-2">
                <label>Stock</label>
                <input id="stock" type="number" class="form-control" value="2" readonly>
            </div>

            <div class="card-area mb-8">
                <label>Description <i>(Optional)</i></label>
                <textarea rows="4" class="form-control rounded-textarea" value="" readonly> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </textarea>
            </div>

            <div class="action-buttons">
                <button type="button" class="btn-save" onclick="openBookDetailsModal(this)">Borrow</button>
                <button type="button" class="btn-cancel" onclick="closeBookDetailsModal(this)">Cancel</button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openBookDetailsModal(button) {
        window.location = "{{ route('user.borrow-book') }}";
    }

    function closeBookDetailsModal() {
        window.location = "{{ route('user.home') }}";
    }
</script>
@endpush