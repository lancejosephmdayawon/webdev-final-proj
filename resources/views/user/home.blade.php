@extends('layouts.user-home')
@section('title', 'ISKO-LIB: Student Home')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <!--GREETING CARD-->
            <div class="greet-card mb-4">
                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-6 col-lg-9 mb-2">
                        <div class="top-text">
                            <p class="top-title fw-bold mb-0">Greetings, Student!</p>
                            <p class="top-detail mb-0">
                                Greetings from the library! This academic institutions acts as a research and study hub,
                                allowing users to engage intellectually through access to the materials that support what
                                you need. Students are motivated to independently explore, evaluate and utilize information
                                resources in order to extend their learning and research work.
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 d-flex justify-content-center">
                        <img src="{{ asset('images/stu-greet.png') }}" class="stu-greet">
                    </div>
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
                            <button class="btn-view" onclick="openViewModal('{{ $book->id }}', '{{ $book->stock_qty }}')">View Details</button>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@include('modals.user-unavailable-book')

@endsection


@push('scripts')
<script>
    function openViewModal(bookID, stock) {
        if (stock > 0) {
            // If in stock, go to details page
            const url = "{{ route('user.book-details', ':id') }}".replace(':id', bookID);
            window.location = url;
        } else {
            // Show "Out of Stock" modal
            const modal = document.getElementById('outOfStockModal');
            modal.style.display = 'flex';
        }
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