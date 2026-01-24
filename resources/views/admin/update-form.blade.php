@extends('layouts.admin-upd-form')
@section('title', 'ISKO-LIB: Librarian Update a Book')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="form-card">

                <form id="updateBookForm">
                    @csrf
                    @method('PUT')

                    <div class="card-field mb-2">
                        <label>ISBN</label>
                        <input name="isbn" type="text" class="form-control" value="{{ $book->isbn }}">
                    </div>

                    <div class="card-field mb-2">
                        <label>Book Title</label>
                        <input name="title" type="text" class="form-control" value="{{ $book->title }}">
                    </div>

                    <div class="card-field mb-2">
                        <label>Author</label>
                        <input name="author" type="text" class="form-control" value="{{ $book->author }}">
                    </div>

                    <div class="card-field-categ mb-2">
                        <label>Category</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $book->category_id) selected @endif>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-field mb-2">
                        <label>Stock</label>
                        <input name="stock_qty" type="number" class="form-control" value="{{ $book->stock_qty }}">
                    </div>

                    <div class="card-area mb-8">
                        <label>Description <i>(Optional)</i></label>
                        <textarea name="description" rows="4" class="form-control rounded-textarea">{{ $book->description }}</textarea>
                    </div>

                    <div class="action-buttons">
                        <button type="button" class="btn-save" onclick="openUpdConModal()">Save</button>
                        <button type="button" class="btn-cancel" onclick="closeUpdConModal()">Cancel</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    function openUpdConModal() {
        document.getElementById('updConModal').style.display = 'flex';
    }

    function closeConfirmModal() {
        document.getElementById('updConModal').style.display = 'none';
    }

    function confirmUpd() {
        const form = document.getElementById('updateBookForm');
        const url = "{{ route('admin.update-book.submit', $book->id) }}";

        fetch(url, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(new FormData(form)))
            })
            .then(res => res.json())
            .then(data => {
                closeConfirmModal();
                if (data.message === 'Nothing to be saved') {
                    alert('Nothing to be saved');
                } else {
                    document.getElementById('updSuccessModal').style.display = 'flex';
                }
            })
            .catch(err => console.error(err));
    }

    function closeUpdConModal() {
        window.location = "{{ route('admin.inventory') }}";
    }

    function closeSuccessModal() {
        window.location = "{{ route('admin.inventory') }}";
    }
</script>
@endpush