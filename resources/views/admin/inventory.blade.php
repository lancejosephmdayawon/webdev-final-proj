@extends('layouts.admin-inventory')
@section('title', 'ISKO-LIB: Librarian Inventory')
@section('content')

<div id="inventoryTab" class="main-container">
    <div class="inner-container">
        <div class="top-card d-flex justify-content-between align-items-center mb-4">
            <p class="top-title fw-bold mb-0">Book Inventory</p>
            <a href="{{ route('admin.add-book') }}" class="add-btn">Add</a>
        </div>

        <div class="category-card">
            <div class="row g-4">
                <div class="col-sm-6 col-lg-2">
                    <a href="#" class="st-btn d-block text-center">Science & Technology</a>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <a href="#" class="lit-btn d-block text-center">Literature</a>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <a href="#" class="soc-btn d-block text-center">Social Studies</a>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <a href="#" class="eco-btn d-block text-center">Economics</a>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <a href="#" class="his-btn d-block text-center">History</a>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <a href="#" class="phi-btn d-block text-center">Philosophy</a>
                </div>
            </div>
        </div>

@php
$categoryOrder = [
    'Science & Technology' => ['color' => 'st-bar', 'img' => 'SciTech.png'],
    'Literature' => ['color' => 'lit-bar', 'img' => 'Literature.png'],
    'Social Studies' => ['color' => 'soc-bar', 'img' => 'SocStud.png'],
    'Economics' => ['color' => 'eco-bar', 'img' => 'Economics.png'],
    'History' => ['color' => 'his-bar', 'img' => 'History.png'],
    'Philosophy' => ['color' => 'phi-bar', 'img' => 'Philosophy.png'],
];
@endphp

<div class="category-book-grid row g-4">

    @foreach($categoryOrder as $catName => $catData)
        <div class="col-sm-6 col-lg-2">

            @php
                $category = $categories->firstWhere('category_name', $catName);
                $books = $category ? $category->books : collect();
            @endphp

            @foreach($books as $book)
            <div class="st-card position-relative overflow-hidden mb-3">

                <!-- Category Color Bar -->
                <div class="categ-bar">
                    <div class="{{ $catData['color'] }}"></div>
                </div>

                <!-- Status & Stock -->
                <div class="book-card-details mb-2">
                    <span class="{{ $book->stock_qty > 0 ? 'avail-label' : 'notavail-label' }}">
                        {{ $book->stock_qty > 0 ? 'Available' : 'Not Available' }}
                    </span>
                    <span><b>QTY: {{ $book->stock_qty }}</b></span>
                </div>

                <!-- Book Info -->
                <div class="book-content mb-4">
                    <div class="categ-icon mb-2">
                        <img src="{{ asset('images/' . $catData['img']) }}" alt="{{ $catName }}">
                    </div>
                    <div class="book-data">
                        <p>{{ $book->isbn }}</p>
                        <p class="book-data-title"><b>{{ $book->title }}</b></p>
                        <p>{{ $book->author }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="book-actions">
                    <button type="button" class="btn-edit" onclick="openEditModal('{{ $book->id }}')">Edit</button>
                    <button type="button" class="btn-delete" onclick="openDeleteModal('{{ $book->id }}')">Delete</button>
                </div>
            </div>
            @endforeach

        </div>
    @endforeach

</div>

<!-- DELETE CONFIRMATION MODAL -->
<div id="delConModal" class="confirm-overlay" style="display:none;">
    <div class="popup-confirm">
        <div class="align-center">
            <img src="{{ asset('images/del-con.png') }}" class="del-con-img">
        </div>
        <h2 class="my-2">Are you sure you want to delete this book?</h2>
        <div class="popup-btn mt-4">
            <button class="btn-confirm" onclick="confirmDel()">Confirm</button>
            <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
let deleteBookId = null;

// Edit button
function openEditModal(bookId) {
    window.location.href = `/librarian/update-book/${bookId}`;
}

// Open delete confirmation modal
function openDeleteModal(bookId) {
    deleteBookId = bookId;
    document.getElementById('delConModal').style.display = 'flex';
}

// Confirm delete
function confirmDel() {
    if (!deleteBookId) return;

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `/librarian/delete-book/${deleteBookId}`;

    // CSRF token
    const csrf = document.createElement('input');
    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = '{{ csrf_token() }}';
    form.appendChild(csrf);

    // Spoof DELETE method
    const method = document.createElement('input');
    method.type = 'hidden';
    method.name = '_method';
    method.value = 'DELETE';
    form.appendChild(method);

    document.body.appendChild(form);
    form.submit();
}

// Close delete modal
function closeDeleteModal() {
    deleteBookId = null;
    document.getElementById('delConModal').style.display = 'none';
}
</script>
@endpush