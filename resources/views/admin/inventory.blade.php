@extends('layouts.admin-inventory')
@section('title', 'ISKO-LIB: Librarian Inventory')
@section('content')

<div id="inventoryTab" class="main-container">
    <div class="inner-container">
        {{-- Top bar --}}
        <div class="top-card row mb-4">
            <!-- Left column -->
            <div class="col-12 col-md-6 text-center text-md-start">
                <p class="top-title fw-bold mb-2">Book Inventory</p>
            </div>
            <!-- Right column -->
            <div class="col-12 col-md-6 text-center text-md-end text-md-start mt-2 mb-2 mt-md-0">
                <a href="{{ route('admin.add-book') }}" class="add-btn">Add</a>
            </div>
        </div>


        {{-- Category filter --}}
        <div class="category-card">
            <div class="row g-4">
                @php
                $categoriesList = [
                'Science & Technology' => 'st-btn',
                'Literature' => 'lit-btn',
                'Social Studies' => 'soc-btn',
                'Economics' => 'eco-btn',
                'History' => 'his-btn',
                'Philosophy' => 'phi-btn'
                ];
                @endphp
                @foreach($categoriesList as $catName => $catClass)
                <div class="col-sm-6 col-lg-2">
                    <a href="#"
                        class="{{ $catClass }} d-block text-center category-filter"
                        data-category="{{ $catName }}">
                        {{ $catName }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        @php
        $categoryMeta = [
        'Science & Technology' => ['color' => 'st-bar', 'img' => 'SciTech.png'],
        'Literature' => ['color' => 'lit-bar', 'img' => 'Literature.png'],
        'Social Studies' => ['color' => 'soc-bar', 'img' => 'SocStud.png'],
        'Economics' => ['color' => 'eco-bar', 'img' => 'Economics.png'],
        'History' => ['color' => 'his-bar', 'img' => 'History.png'],
        'Philosophy' => ['color' => 'phi-bar', 'img' => 'Philosophy.png'],
        ];
        @endphp

        {{-- Book grid --}}
        <div class="category-book-grid row g-4">
            @foreach($books as $book)
            @php
            $catName = $book->category->category_name;
            $meta = $categoryMeta[$catName] ?? null;
            @endphp

            <div class="col-sm-6 col-lg-2 book-item" data-category="{{ $catName }}">
                <div class="st-card position-relative overflow-hidden mb-3">

                    {{-- Category color bar --}}
                    <div class="categ-bar">
                        <div class="{{ $meta['color'] ?? '' }}"></div>
                    </div>

                    {{-- Stock info --}}
                    <div class="book-card-details mb-2">
                        <span class="{{ $book->stock_qty > 0 ? 'avail-label' : 'notavail-label' }}">
                            {{ $book->stock_qty > 0 ? 'Available' : 'Not Available' }}
                        </span>
                        <span><b>QTY: {{ $book->stock_qty }}</b></span>
                    </div>

                    {{-- Book info --}}
                    <div class="book-content mb-4">
                        <div class="categ-icon mb-2">
                            <img src="{{ asset('images/' . ($meta['img'] ?? 'default.png')) }}" alt="{{ $catName }}">
                        </div>
                        <div class="book-data">
                            <p>{{ $book->isbn }}</p>
                            <p class="book-data-title"><b>{{ $book->title }}</b></p>
                            <p>{{ $book->author }}</p>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="book-actions">
                        <button class="btn-edit" onclick="openEditModal('{{ $book->id }}')">Edit</button>
                        <button class="btn-delete" onclick="openDeleteModal('{{ $book->id }}')">Delete</button>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

{{-- Include modals --}}
@include('modals.admin-del-confirm')
@include('modals.admin-del-success')

@endsection

@push('scripts')
<script>
    let deleteBookId = null;

    // Edit
    function openEditModal(bookId) {
        window.location.href = `/librarian/update-book/${bookId}`;
    }

    // Delete modals
    function openDeleteModal(bookId) {
        deleteBookId = bookId;
        document.getElementById('delConModal').style.display = 'flex';
    }

    function closeDeleteModal() {
        deleteBookId = null;
        document.getElementById('delConModal').style.display = 'none';
    }

    // Confirm delete (AJAX)
    function confirmDel() {
        if (!deleteBookId) return;

        fetch(`/librarian/delete-book/${deleteBookId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('delConModal').style.display = 'none';
                document.getElementById('delSuccessModal').style.display = 'flex';
            })
            .catch(err => {
                console.error(err);
                alert('Failed to delete book.');
            });
    }

    // Category filtering
    const categoryButtons = document.querySelectorAll('.category-filter');
    const books = document.querySelectorAll('.book-item');
    let activeCategory = null;

    categoryButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const selectedCategory = this.dataset.category;

            if (activeCategory === selectedCategory) {
                activeCategory = null;
                categoryButtons.forEach(b => b.classList.remove('active'));
                books.forEach(b => b.style.display = 'block');
                return;
            }

            activeCategory = selectedCategory;
            categoryButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            books.forEach(b => {
                b.style.display = b.dataset.category === selectedCategory ? 'block' : 'none';
            });
        });
    });
</script>
@endpush