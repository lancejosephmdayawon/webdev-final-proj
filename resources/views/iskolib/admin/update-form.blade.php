@extends('layouts.admin-upd-form')
@section('title', 'ISKO-LIB: Librarian Update a Book')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="form-card">

            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/book-upd.png') }}" class="book-upd-img mb-2">
                <h2 class="font-extrabold">Update the Archive</h2>
            </div>

            <div class="card-field mb-2">
                <label>ISBN</label>
                <input id="name" type="text" class="form-control">
            </div>

            <div class="card-field mb-2">
                <label>Book Title</label>
                <input id="title" type="text" class="form-control">
            </div>

            <div class="card-field mb-2">
                <label>Author</label>
                <input id="author" type="text" class="form-control">
            </div>

            <div class="card-field-categ mb-2">
                <label>Category</label>
                <select id="category" class="form-select">
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
                <input id="stock" type="number" class="form-control">
            </div>

            <div class="card-area mb-8">
                <label>Description <i>(Optional)</i></label>
                <textarea rows="4" class="form-control rounded-textarea"></textarea>
            </div>

            <div class="action-buttons">
                <button type="button" class="btn-save" onclick="openUpdConModal(this)">Save</button>
                <button type="button" class="btn-cancel" onclick="closeUpdConModal(this)">Cancel</button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openUpdConModal(button) {
        const modal = document.getElementById('updConModal');
        modal.style.display = 'flex';
    }

    function closeUpdConModal() {
        window.location = "{{ route('iskolib.admin.inventory') }}";
    }
</script>
@endpush