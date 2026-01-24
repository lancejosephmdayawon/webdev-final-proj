@extends('layouts.user-book-details')
@section('title', 'ISKO-LIB: Student Book Details')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="form-card">

                <div class="book-info-card row justify-content-center text-center mb-4">
                    <img src="{{ asset('images/book-details.png') }}" class="book-details-img mb-2">
                    <h2 class="font-extrabold">{{ $book->title }}</h2>
                </div>

                <div class="card-field mb-2">
                    <label>ISBN</label>
                    <input type="text" class="form-control" value="{{ $book->isbn }}" readonly>
                </div>

                <div class="card-field mb-2">
                    <label>Book Title</label>
                    <input type="text" class="form-control" value="{{ $book->title }}" readonly>
                </div>

                <div class="card-field mb-2">
                    <label>Author</label>
                    <input type="text" class="form-control" value="{{ $book->author }}" readonly>
                </div>

                <div class="card-field-categ mb-2">
                    <label>Category</label>
                    <input type="text" class="form-control" value="{{ $book->category->category_name ?? 'N/A' }}" readonly>
                </div>

                <div class="card-field mb-2">
                    <label>Stock</label>
                    <input type="number" class="form-control" value="{{ $book->stock_qty }}" readonly>
                </div>

                <div class="card-area mb-8">
                    <label>Description <i>(Optional)</i></label>
                    <textarea rows="4" class="form-control rounded-textarea" readonly>{{ $book->description }}</textarea>
                </div>

                <div class="action-buttons">
                    <button class="btn-save" onclick="openBookDetailsModal('{{ $book->id }}')">
                        Borrow
                    </button>
                    <button type="button" class="btn-cancel" onclick="closeBookDetailsModal()">
                        Cancel
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openBookDetailsModal(bookId) {
        const url = "{{ route('user.borrow-book', ':id') }}".replace(':id', bookId);
        window.location = url;
    }

    function closeBookDetailsModal() {
        window.location = "{{ route('user.home') }}";
    }
</script>
@endpush