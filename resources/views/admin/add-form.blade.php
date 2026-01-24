@extends('layouts.admin-add-form')
@section('title', 'ISKO-LIB: Librarian Add a Book')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="form-card">

                <div class="book-info-card row justify-content-center text-center mb-4">
                    <img src="{{ asset('images/book-add.png') }}" class="book-add-img mb-2">
                    <h2 class="font-extrabold">Expand the Library</h2>
                </div>

                <form id="addBookForm">
                    @csrf

                    <div class="card-field mb-2">
                        <label>ISBN</label>
                        <input name="isbn" type="text" class="form-control" placeholder="Enter ISBN">
                    </div>

                    <div class="card-field mb-2">
                        <label>Book Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Enter book title">
                    </div>

                    <div class="card-field mb-2">
                        <label>Author</label>
                        <input name="author" type="text" class="form-control" placeholder="Enter author">
                    </div>

                    <div class="card-field-categ mb-2">
                        <label>Category</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-field mb-2">
                        <label>Stock</label>
                        <input name="stock_qty" type="number" class="form-control" placeholder="Enter stock quantity" min="0">
                    </div>

                    <div class="card-area mb-8">
                        <label>Description <i>(Optional)</i></label>
                        <textarea name="description" rows="4" class="form-control rounded-textarea" placeholder="Enter description"></textarea>
                    </div>

                    <div class="action-buttons">
                        <button type="button" class="btn-save" onclick="openAddConModal()">Save</button>
                        <button type="button" class="btn-cancel" onclick="cancelAdd()">Cancel</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    function openAddConModal() {
        document.getElementById('addConModal').style.display = 'flex';
    }

    function confirmAdd() {
        const form = document.getElementById('addBookForm');
        const url = "{{ route('admin.add-book.submit') }}";

        fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(new FormData(form)))
            })
            .then(res => {
                if (!res.ok) throw res;
                return res.json();
            })
            .then(data => {
                document.getElementById('addConModal').style.display = 'none';
                document.getElementById('addSuccessModal').style.display = 'flex';
            })
            .catch(async err => {
                let message = 'An error occurred';
                if (err.json) {
                    const e = await err.json();
                    message = e.message || JSON.stringify(e.errors);
                }
                alert(message);
            });
    }

    function cancelAdd() {
        window.location = "{{ route('admin.inventory') }}";
    }

    function closeConfirmModal() {
        document.getElementById('addConModal').style.display = 'none';
    }

    function closeSuccessModal() {
        window.location = "{{ route('admin.inventory') }}";
    }

    function closeAddModal() {
        window.location = "{{ route('admin.inventory') }}";
    }
</script>
@endpush