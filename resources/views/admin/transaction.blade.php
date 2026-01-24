@extends('layouts.admin-transaction')
@section('title', 'ISKO-LIB: Librarian Transaction')
@section('content')

<div id="transactionsTab" class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="top-card">
                <div class="row">

                    <!-- Dynamic Borrow Requests -->
                    @php
                    $categoryMeta = [
                    'Science & Technology' => ['color' => 'st-bar', 'img' => 'SciTech.png'],
                    'Literature' => ['color' => 'lit-bar', 'img' => 'Literature.png'],
                    'Social Studies' => ['color' => 'soc-bar', 'img' => 'SocStud.png'],
                    'Economics' => ['color' => 'eco-bar', 'img' => 'Economics.png'],
                    'History' => ['color' => 'his-bar', 'img' => 'History.png'],
                    'Philosophy' => ['color' => 'phi-bar', 'img' => 'Philosophy.png'],
                    ];

                    $categories = [
                    1 => 'Science & Technology',
                    2 => 'Literature',
                    3 => 'Social Studies',
                    4 => 'Economics',
                    5 => 'History',
                    6 => 'Philosophy',
                    ];
                    @endphp

                    <!--REQUEST TO BORROW-->
                    <div class="col-sm-12 col-lg-8">
                        <div class="request-borrow">
                            <div class="top-card d-flex justify-content-between align-items-center mb-2">
                                <p class="top-title fw-bold mb-0">Request to Borrow</p>
                            </div>

                            <div class="book-card">
                                <div class="d-flex flex-row flex-nowrap overflow-auto g-4 mb-4 px-2">
                                    @foreach($borrowRequests as $request)
                                    @php
                                    $book = $request->book;
                                    $categoryName = $book->category->category_name ?? 'Unknown';
                                    $colorClass = $categoryMeta[$categoryName]['color'] ?? 'default-bar';
                                    $img = $categoryMeta[$categoryName]['img'] ?? 'default.png';
                                    @endphp

                                    <div class="col-sm-6 col-lg-3 flex-shrink-0">
                                        <div class="st-card position-relative overflow-hidden me-3">
                                            <!-- Category Bar -->
                                            <div class="categ-bar">
                                                <div class="{{ $colorClass }}"></div>
                                            </div>

                                            <!-- Status Banner -->
                                            <div class="book-card-details mb-2">
                                                <span class="pending-label">Pending</span>
                                                <span><b>{{ $request->request_date->format('m/d/y') }}</b></span>
                                            </div>

                                            <!-- Book Content -->
                                            <div class="book-content mb-4">
                                                <div class="categ-icon mb-2">
                                                    <img src="{{ asset('images/' . $img) }}" alt="Category">
                                                </div>
                                                <div class="book-data">
                                                    <p>{{ $book->isbn }}</p>
                                                    <p class="book-data-title"><b>{{ $book->title }}</b></p>
                                                    <p>{{ $book->author }}</p>
                                                </div>
                                            </div>

                                            <!-- Action Buttons -->
                                            <div class="book-actions">
                                                <button type="button" class="btn-view" onclick="openViewModal('{{ $request->id }}')">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 mb-4">

                        <!-- Declined Requests -->
                        <div class="decline-card">

                            <!-- Sticky Header -->
                            <div class="top-card decline-header">
                                <p class="top-title-decline fw-bold mb-0">Declined Requests</p>
                            </div>

                            <!-- Scrollable Content -->
                            <div class="decline-body">
                                @forelse($declinedRequests as $req)
                                @php
                                $catName = $categories[$req->book->category_id] ?? 'Unknown';
                                $meta = $categoryMeta[$catName] ?? [
                                'color' => 'default-bar',
                                'img' => 'default.png'
                                ];
                                @endphp

                                <div class="card-data-book" data-id="{{ $req->id }}">

                                    <div class="categ-bar">
                                        <div class="{{ $meta['color'] }}"></div>
                                    </div>

                                    <div class="circle">
                                        <img src="{{ asset('images/' . $meta['img']) }}" class="categ-img">
                                    </div>

                                    <div class="card-book-info">
                                        <p class="card-book-title">{{ $req->book->title }}</p>
                                        <p class="card-book-author">{{ $req->book->author }}</p>
                                    </div>

                                    <div class="card-b-r-decline">
                                        <p class="card-book-date">
                                            {{ $req->request_date->format('m/d/y') }}
                                        </p>
                                    </div>

                                </div>
                                @empty
                                <p class="text-muted text-center mt-3">
                                    No declined requests.
                                </p>
                                @endforelse
                            </div>

                        </div>
                    </div>


                </div>
            </div>



            <!-- 1st Row -->
            <div class="bottom-card">
                <div class="row g-4 mb-4">
                    <!-- UNBORROWED BOOKS -->
                    <div class="col-12 col-md-4">
                        <div class="unborrowed-card" style="height: 600px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">

                            <!-- Sticky header -->
                            <div class="card-header sticky-top bg-white p-3" style="border-bottom: 1px solid #e2e2e2; z-index: 10;">
                                <p class="bot-title fw-bold mb-0">Unborrowed Books</p>
                            </div>

                            <!-- Scrollable body -->
                            <div class="card-body overflow-auto p-3" style="max-height: 540px;">
                                @foreach ($unborrowedTransactions as $transaction)
                                @php
                                $book = $transaction->borrowRequest->book;
                                $category = $book->category->category_name;

                                $colorClass = $categoryMeta[$category]['color'] ?? 'default-bar';
                                $imgFile = $categoryMeta[$category]['img'] ?? 'default.png';
                                @endphp

                                <div class="card-data-book position-relative overflow-hidden m-2"
                                    onclick="openUnborrowedModal('{{ $transaction->id }}')">

                                    <!-- Category Color -->
                                    <div class="categ-bar">
                                        <div class="{{ $colorClass }}"></div>
                                    </div>

                                    <!-- Category Image -->
                                    <div class="circle">
                                        <img src="{{ asset('images/' . $imgFile) }}" class="categ-img">
                                    </div>

                                    <!-- Book Details -->
                                    <div class="card-book-info">
                                        <p class="card-book-title">{{ $book->title }}</p>
                                        <p class="card-book-author">{{ $book->author }}</p>
                                    </div>

                                    <!-- Request Date -->
                                    <div class="card-book-over">
                                        <button type="button" class="btn-date-unborrowed">
                                            {{ $transaction->borrowRequest->request_date->format('m/d/y') }}
                                        </button>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <!-- BORROWED BOOKS -->
                    <div class="col-12 col-md-4">
                        <div class="unborrowed-card" style="height: 600px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">

                            <!-- Sticky header -->
                            <div class="card-header sticky-top bg-white p-3" style="border-bottom: 1px solid #e2e2e2; z-index: 10;">
                                <p class="bot-title fw-bold mb-0">Borrowed Books</p>
                            </div>

                            <!-- Scrollable body -->
                            <div class="card-body overflow-auto p-3" style="max-height: 540px;">
                                @foreach ($borrowedTransactions as $transaction)
                                @php
                                $book = $transaction->borrowRequest->book;
                                $category = $book->category->category_name;

                                $colorClass = $categoryMeta[$category]['color'] ?? 'default-bar';
                                $imgFile = $categoryMeta[$category]['img'] ?? 'default.png';
                                @endphp

                                <div class="card-data-book position-relative overflow-hidden m-2"
                                    onclick="openBorrowedModal('{{ $transaction->id }}')">

                                    <!-- Category Color -->
                                    <div class="categ-bar">
                                        <div class="{{ $colorClass }}"></div>
                                    </div>

                                    <!-- Category Image -->
                                    <div class="circle">
                                        <img src="{{ asset('images/' . $imgFile) }}" class="categ-img">
                                    </div>

                                    <!-- Book Details -->
                                    <div class="card-book-info">
                                        <p class="card-book-title">{{ $book->title }}</p>
                                        <p class="card-book-author">{{ $book->author }}</p>
                                    </div>

                                    <!-- Request Date -->
                                    <div class="card-book-over">
                                        <button type="button" class="btn-date-borrowed">
                                            {{ $transaction->borrowRequest->request_date->format('m/d/y') }}
                                        </button>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <!-- OVERDUE BOOKS -->
                    <div class="col-12 col-md-4">
                        <div class="unborrowed-card" style="height: 600px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">

                            <!-- Sticky header -->
                            <div class="card-header sticky-top bg-white p-3" style="border-bottom: 1px solid #e2e2e2; z-index: 10;">
                                <p class="bot-title fw-bold mb-0">Overdue Books</p>
                            </div>

                            <!-- Scrollable body -->
                            <div class="card-body overflow-auto p-3" style="max-height: 540px;">
                                @foreach ($overdueTransactions as $transaction)
                                @php
                                $book = $transaction->borrowRequest->book;
                                $category = $book->category->category_name;

                                $colorClass = $categoryMeta[$category]['color'] ?? 'default-bar';
                                $imgFile = $categoryMeta[$category]['img'] ?? 'default.png';
                                @endphp

                                <div class="card-data-book position-relative overflow-hidden m-2"
                                    onclick="openOverdueModal('{{ $transaction->id }}')">

                                    <!-- Category Color -->
                                    <div class="categ-bar">
                                        <div class="{{ $colorClass }}"></div>
                                    </div>

                                    <!-- Category Image -->
                                    <div class="circle">
                                        <img src="{{ asset('images/' . $imgFile) }}" class="categ-img">
                                    </div>

                                    <!-- Book Details -->
                                    <div class="card-book-info">
                                        <p class="card-book-title">{{ $book->title }}</p>
                                        <p class="card-book-author">{{ $book->author }}</p>
                                    </div>

                                    <!-- Request Date -->
                                    <div class="card-book-over">
                                        <button type="button" class="btn-date-overdue">
                                            {{ $transaction->borrowRequest->request_date->format('m/d/y') }}
                                        </button>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>




            <!-- 2nd Row -->
            <div class="bottom-card">
                <div class="row g-4 mb-4">
                    <!-- RETURNED BOOKS -->
                    <div class="col-12">
                        <div style="height: 600px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">

                            <!-- Sticky header -->
                            <div class="card-header sticky-top p-3" style="border-bottom: 1px solid #e2e2e2; z-index: 10;">
                                <p class="bot-title fw-bold mb-0">Returned Books</p>
                            </div>

                            <!-- Scrollable body -->
                            <div class="card-body overflow-auto p-3" style="max-height: 540px;">
                                @foreach ($returnedTransactions as $transaction)
                                @php
                                $book = $transaction->borrowRequest->book;
                                $category = $book->category->category_name;

                                $colorClass = $categoryMeta[$category]['color'] ?? 'default-bar';
                                $imgFile = $categoryMeta[$category]['img'] ?? 'default.png';
                                @endphp

                                <div class="card-data-book"
                                    onclick="openReturnedModal('{{ $transaction->id }}')">

                                    <!-- Category Color -->
                                    <div class="categ-bar">
                                        <div class="{{ $colorClass }}"></div>
                                    </div>

                                    <!-- Category Image -->
                                    <div class="circle">
                                        <img src="{{ asset('images/' . $imgFile) }}" class="categ-img">
                                    </div>

                                    <!-- Book Details -->
                                    <div class="card-book-info">
                                        <p class="card-book-title">{{ $book->title }}</p>
                                        <p class="card-book-author">{{ $book->author }}</p>
                                    </div>

                                    <!-- Request Date -->
                                    <div class="card-book-over">
                                        <button type="button" class="btn-date-returned" disabled>
                                            {{ $transaction->borrowRequest->request_date->format('m/d/y') }}
                                        </button>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script>
    function openViewModal(requestId) {
        // Use the route with a placeholder and replace it with the requestId
        const url = "{{ route('admin.borrow-request', ':id') }}".replace(':id', requestId);
        window.location = url;
    }

    function openDeclineModal(el) {
        const id = el.dataset.id;
        if (!id) {
            console.error('No ID found for this declined request.');
            return;
        }
        // Redirect to the borrow-decline page
        const url = "{{ route('admin.borrow-decline', ':id') }}".replace(':id', id);
        window.location = url;
    }

    // For Unborrowed
    function openUnborrowedModal(transactionId) {
        const url = "{{ route('admin.unborrowed-book', ':id') }}".replace(':id', transactionId);
        window.location = url;
    }

    // For Borrowed
    function openBorrowedModal(transactionId) {
        const url = "{{ route('admin.borrowed-book', ':id') }}".replace(':id', transactionId);
        window.location = url;
    }

    // For Returned
    function openReturnedModal(transactionID) {
        const url = "{{ route('admin.returned-book', ':id') }}".replace(':id', transactionID);
        window.location = url;
    }

    function openOverdueModal(transactionID) {
        const url = "{{ route('admin.overdue-book', ':id') }}".replace(':id', transactionID);
        window.location = url;
    }
</script>
@endpush