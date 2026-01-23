@extends('layouts.user-books')
@section('title', 'ISKO-LIB: Student Books')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="row">

            <!--LEFT COLUMN-->
            <div class="col-sm-12 col-lg-4">
                <div class="left-card">
                    <div class="col">
                        <div class="row-sm-12 row-lg-4 mb-8">
                            <!-- BORROW FORM -->
                            <div class="card">
                                <span class="card__title">Borrow Form</span>
                                <p class="card__content">
                                    Access the library's collection through a simplified borrowing system designed to facilitate student,
                                    instructional and research activities. Library users are welcomed to discover the resources on shelf
                                    and use the lending services in an efficient way complying with the rules of the library.
                                </p>
                                <form class="card__form">
                                    <button type="button" class="card__button" onclick="openBorrowFormModal(this)">Click me</button>
                                </form>
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

                        <!--BOOK HISTORY-->
                        <div class="row mb-8">
                            <div class="col-sm-12 col-lg-12">
                                <div class="history-card">
                                    <!-- Sticky header -->
                                    <div class="card-header sticky-top bg-white p-3" style="border-bottom: 1px solid #e2e2e2; z-index: 10;">
                                        <p class="bot-title fw-bold mb-0">Book History</p>
                                    </div>

                                    <div class="card-body overflow-auto p-3" style="max-height: 540px;">
                                        @foreach($history as $item)
                                        @php
                                        $book = $item->book;
                                        $meta = $categoryMeta[$book->category->category_name ?? ''] ?? ['color' => 'default-bar', 'img' => 'default.png'];
                                        $returnDate = $item->transaction?->returnLog?->date_returned;
                                        @endphp

                                        <div class="card-data-book position-relative overflow-hidden mb-2"
                                            onclick="openBookHistoryModal('{{ $book->id }}')">

                                            <!-- Category Color -->
                                            <div class="categ-bar">
                                                <div class="{{ $meta['color'] }}"></div>
                                            </div>

                                            <!-- Category Image -->
                                            <div class="circle">
                                                <img src="{{ asset('images/' . $meta['img']) }}" class="categ-img">
                                            </div>

                                            <!-- Book Details -->
                                            <div class="card-book-info">
                                                <p class="card-book-title">{{ $book->title }}</p>
                                                <p class="card-book-author">{{ $book->author }}</p>
                                            </div>

                                            <!-- Date Returned -->
                                            <p class="card-book-date">
                                                {{ $returnDate ? \Carbon\Carbon::parse($returnDate)->format('m/d/y') : '-' }}
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!--RIGHT COLUMN-->
            <div class="col-sm-12 col-lg-8">
                <div class="right-card">
                    <div class="col">

                        <!-- BORROW REQUESTS -->
                        <div class="borrow-request">
                            <div class="top-card d-flex justify-content-between align-items-center mb-2">
                                <p class="top-title fw-bold mb-0">Borrow Requests</p>
                            </div>

                            <div class="book-card">
                                <div class="row g-4 mb-4">
                                    @forelse($borrowRequests as $req)
                                    @php
                                    $book = $req->book;
                                    $categoryName = $book->category->category_name ?? '';
                                    $meta = $categoryMeta[$categoryName] ?? ['color' => 'default-bar', 'img' => 'default.png'];
                                    $status = $req->status ?? 'pending';
                                    $statusClass = match($status) {
                                    'approved' => 'approved-label',
                                    'pending' => 'pending-label',
                                    'declined' => 'declined-label',
                                    'borrowed' => 'borrowed-label',
                                    default => 'pending-label',
                                    };
                                    $date = \Carbon\Carbon::parse($req->request_date)->format('m/d/y');
                                    @endphp

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="st-card position-relative overflow-hidden">
                                            <div class="categ-bar">
                                                <div class="{{ $meta['color'] }}"></div>
                                            </div>

                                            <div class="book-card-details mb-2">
                                                <span class="{{ $statusClass }}">{{ ucfirst($status) }}</span>
                                                <span><b>{{ $date }}</b></span>
                                            </div>

                                            <div class="book-content">
                                                <div class="categ-icon mb-2">
                                                    <img src="{{ asset('images/' . $meta['img']) }}" alt="Category">
                                                </div>

                                                <div class="book-data">
                                                    <p class="text-truncate" title="{{ $book->isbn ?? '-' }}">{{ $book->isbn ?? '-' }}</p>
                                                    <p class="book-data-title text-truncate" title="{{ $book->title }}"><b>{{ $book->title }}</b></p>
                                                    <p class="text-truncate" title="{{ $book->author }}">{{ $book->author }}</p>
                                                </div>
                                            </div>

                                            <div class="book-actions">
                                                <button type="button" class="btn-view" onclick="openBorReqModal('{{ $req->id }}')">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="no-data-card d-flex justify-content-center align-items-center text-center">
                                            <p class="mb-0 font-semibold">Not applicable.</p>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>




                        <!-- UNBORROWED BOOKS -->
                        <div class="borrow-request">
                            <div class="top-card d-flex justify-content-between align-items-center mb-2">
                                <p class="top-title fw-bold mb-0">Unborrowed Books</p>
                            </div>

                            <div class="book-card">
                                <div class="row g-4 mb-4">
                                    @forelse($unborrowedBooks as $req)
                                    @php
                                    $book = $req->book;
                                    $categoryName = $book->category->category_name ?? '';
                                    $meta = $categoryMeta[$categoryName] ?? ['color' => 'default-bar', 'img' => 'default.png'];
                                    $status = $req->transaction?->status ?? 'unborrowed';
                                    $statusClass = match($status) {
                                    'approved' => 'approved-label',
                                    'pending' => 'pending-label',
                                    'declined' => 'declined-label',
                                    'borrowed' => 'borrowed-label',
                                    default => 'pending-label',
                                    };
                                    $date = \Carbon\Carbon::parse($req->request_date)->format('m/d/y');
                                    @endphp

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="st-card position-relative overflow-hidden">
                                            <div class="categ-bar">
                                                <div class="{{ $meta['color'] }}"></div>
                                            </div>

                                            <div class="book-card-details mb-2">
                                                <span class="{{ $statusClass }}">{{ ucfirst($status) }}</span>
                                                <span><b>{{ $date }}</b></span>
                                            </div>

                                            <div class="book-content">
                                                <div class="categ-icon mb-2">
                                                    <img src="{{ asset('images/' . $meta['img']) }}" alt="Category">
                                                </div>

                                                <div class="book-data">
                                                    <p class="text-truncate" title="{{ $book->isbn ?? '-' }}">{{ $book->isbn ?? '-' }}</p>
                                                    <p class="book-data-title text-truncate" title="{{ $book->title }}"><b>{{ $book->title }}</b></p>
                                                    <p class="text-truncate" title="{{ $book->author }}">{{ $book->author }}</p>
                                                </div>
                                            </div>

                                            <div class="book-actions">
                                                <button type="button" class="btn-view" onclick="openBorReqModal('{{ $req->id }}')">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="no-data-card d-flex justify-content-center align-items-center text-center">
                                            <p class="mb-0 font-semibold">Not applicable.</p>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>





                        <!-- BORROWED BOOKS -->
                        <div class="borrow-request">
                            <div class="top-card d-flex justify-content-between align-items-center mb-2">
                                <p class="top-title fw-bold mb-0">Borrowed Books</p>
                            </div>

                            <div class="book-card">
                                <div class="row g-4 mb-4">
                                    @forelse($borrowedBooks as $req)
                                    @php
                                    $book = $req->book;
                                    $categoryName = $book->category->category_name ?? '';
                                    $meta = $categoryMeta[$categoryName] ?? ['color' => 'default-bar', 'img' => 'default.png'];
                                    $status = $req->transaction?->status ?? 'unborrowed';
                                    $statusClass = match($status) {
                                    'approved' => 'approved-label',
                                    'pending' => 'pending-label',
                                    'declined' => 'declined-label',
                                    'borrowed' => 'borrowed-label',
                                    default => 'pending-label',
                                    };
                                    $date = \Carbon\Carbon::parse($req->request_date)->format('m/d/y');
                                    @endphp

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="st-card position-relative overflow-hidden">
                                            <div class="categ-bar">
                                                <div class="{{ $meta['color'] }}"></div>
                                            </div>

                                            <div class="book-card-details mb-2">
                                                <span class="{{ $statusClass }}">{{ ucfirst($status) }}</span>
                                                <span><b>{{ $date }}</b></span>
                                            </div>

                                            <div class="book-content">
                                                <div class="categ-icon mb-2">
                                                    <img src="{{ asset('images/' . $meta['img']) }}" alt="Category">
                                                </div>

                                                <div class="book-data">
                                                    <p class="text-truncate" title="{{ $book->isbn ?? '-' }}">{{ $book->isbn ?? '-' }}</p>
                                                    <p class="book-data-title text-truncate" title="{{ $book->title }}"><b>{{ $book->title }}</b></p>
                                                    <p class="text-truncate" title="{{ $book->author }}">{{ $book->author }}</p>
                                                </div>
                                            </div>

                                            <div class="book-actions">
                                                <button type="button" class="btn-view" onclick="openBorReqModal('{{ $req->id }}')">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="no-data-card d-flex justify-content-center align-items-center text-center">
                                            <p class="mb-0 font-semibold">Not applicable.</p>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>




                        <!-- OVERDUE BOOKS -->
                        @php
                        use Carbon\Carbon;
                        $today = Carbon::today();
                        @endphp

                        <div class="borrow-request">
                            <div class="top-card d-flex justify-content-between align-items-center mb-2">
                                <p class="top-title fw-bold mb-0">Overdue Books</p>
                            </div>

                            <div class="book-card">
                                <div class="row g-4 mb-4">
                                    @forelse($overdueBooks as $req)
                                    @php
                                    $book = $req->book;
                                    $categoryName = $book->category->category_name ?? '';
                                    $meta = $categoryMeta[$categoryName] ?? ['color' => 'default-bar', 'img' => 'default.png'];

                                    $status = 'Overdue';
                                    $statusClass = 'declined-label'; // can style overdue with red or warning color

                                    $date = \Carbon\Carbon::parse($req->request_date)->format('m/d/y');
                                    @endphp

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="st-card position-relative overflow-hidden">
                                            <!-- Category Color -->
                                            <div class="categ-bar">
                                                <div class="{{ $meta['color'] }}"></div>
                                            </div>

                                            <!-- Status Banner -->
                                            <div class="book-card-details mb-2">
                                                <span class="{{ $statusClass }}">{{ $status }}</span>
                                                <span><b>{{ $date }}</b></span>
                                            </div>

                                            <!-- Book Content -->
                                            <div class="book-content">
                                                <div class="categ-icon mb-2">
                                                    <img src="{{ asset('images/' . $meta['img']) }}" alt="Category">
                                                </div>

                                                <div class="book-data">
                                                    <p class="text-truncate" title="{{ $book->isbn ?? '-' }}">{{ $book->isbn ?? '-' }}</p>
                                                    <p class="book-data-title text-truncate" title="{{ $book->title }}"><b>{{ $book->title }}</b></p>
                                                    <p class="text-truncate" title="{{ $book->author }}">{{ $book->author }}</p>
                                                </div>
                                            </div>

                                            <div class="book-actions">
                                                <button type="button" class="btn-view" onclick="openBorReqModal('{{ $req->id }}')">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="no-data-card d-flex justify-content-center align-items-center text-center">
                                            <p class="mb-0 font-semibold">No overdue books.</p>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
                @endsection

                @push('scripts')
                <script>
                    function openBorReqModal(requestId) {
                        window.location = "{{ url('student/borrow-request') }}/" + requestId;
                    }

                    function openUnborBookModal(button) {
                        window.location = "{{ route('user.unborrowed-book') }}"
                    }

                    function openBorBookModal(button) {
                        window.location = "{{ route('user.borrowed-book') }}"
                    }

                    function openOverBookModal(button) {
                        window.location = "{{ route('user.overdue-book') }}"
                    }

                    function openBorrowFormModal(button) {
                        window.location = "{{ route('user.borrow-form') }}"
                    }

                    function openBookHistoryModal(bookId) {
                        window.location = `/student/book-history/${bookId}`;
                    }
                </script>
                @endpush