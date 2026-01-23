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
                        <div class="row-sm-12 row-lg-8 mb-8">
                            <div class="col-sm-12 col-lg-12">
                                <div class="history-card">
                                    <!-- Sticky header -->
                                    <div class="card-header sticky-top bg-white p-3" style="border-bottom: 1px solid #e2e2e2; z-index: 10;">
                                        <p class="bot-title fw-bold mb-0">Book History</p>
                                    </div>

                                    <div class="card-body overflow-auto p-3" style="max-height: 540px;">
                                        @foreach($books as $book)
                                        @php
                                        $meta = $categoryMeta[$book->category->category_name ?? ''] ?? ['color' => 'default-bar', 'img' => 'default.png'];
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

                                            @php
                                            $lastReturned = $book->borrowRequests
                                            ->filter(fn($r) => $r->transaction && $r->transaction->status === 'returned')
                                            ->first();
                                            $returnDate = $lastReturned?->transaction?->returnLog?->date_returned;
                                            @endphp

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

                        <!--BORROW REQUEST-->
                        <div class="row-sm-12 row-lg-4">
                            <div class="borrow-request">
                                <div class="top-card d-flex justify-content-between align-items-center mb-2">
                                    <p class="top-title fw-bold mb-0">Borrow Request</p>
                                </div>

                                <div class="book-card">
                                    <div class="row g-4 mb-4">
                                        <!-- SCIENCE & TECHNOLOGY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="st-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="approved-label">Approved</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/SciTech.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorReqModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- LITERATURE -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="lit-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="pending-label">Pending</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Literature.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorReqModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SOCIAL STUDIES -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="soc-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="declined-label">Declined</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/SocStud.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorReqModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ECONOMICS -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="eco-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="approved-label">Approved</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Economics.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorReqModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- HISTORY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="his-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="pending-label">Pending</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/History.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorReqModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PHILOSOPHY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="phi-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="declined-label">Declined</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Philosophy.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorReqModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--BORROWED BOOKS-->
                        <div class="row-sm-12 row-lg-4">
                            <div class="borrowed-books">
                                <div class="top-card d-flex justify-content-between align-items-center mb-2">
                                    <p class="top-title fw-bold mb-0">Borrowed Books</p>
                                </div>

                                <div class="book-card">
                                    <div class="row g-4 mb-4">
                                        <!-- SCIENCE & TECHNOLOGY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="st-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="borrowed-label">Borrowed</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/SciTech.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- LITERATURE -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="lit-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="borrowed-label">Borrowed</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Literature.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SOCIAL STUDIES -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="soc-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="borrowed-label">Borrowed</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/SocStud.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ECONOMICS -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="eco-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="borrowed-label">Borrowed</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Economics.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- HISTORY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="his-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="borrowed-label">Borrowed</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/History.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PHILOSOPHY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="phi-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="borrowed-label">Borrowed</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Philosophy.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openBorBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--OVERDUE BOOKS-->
                        <div class="row-sm-12 row-lg-4">
                            <div class="overdue-books">
                                <div class="top-card d-flex justify-content-between align-items-center mb-2">
                                    <p class="top-title fw-bold mb-0">Overdue Books</p>
                                </div>

                                <div class="book-card">
                                    <div class="row g-4 mb-4">
                                        <!-- SCIENCE & TECHNOLOGY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="st-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="overdue-label">Overdue</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/SciTech.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openOverBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- LITERATURE -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="lit-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="overdue-label">Overdue</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Literature.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openOverBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SOCIAL STUDIES -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="soc-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="overdue-label">Overdue</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/SocStud.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openOverBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ECONOMICS -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="eco-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="overdue-label">Overdue</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Economics.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openOverBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- HISTORY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="his-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="overdue-label">Overdue</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/History.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openOverBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PHILOSOPHY -->
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="st-card position-relative overflow-hidden">
                                                <div class="categ-bar">
                                                    <!-- Category Color -->
                                                    <div class="phi-bar"></div>
                                                </div>
                                                <!-- Status Banner -->
                                                <div class="book-card-details mb-2">
                                                    <span class="overdue-label">Overdue</span>
                                                    <span><b>01/01/26</b></span>
                                                </div>
                                                <!-- Book Content -->
                                                <div class="book-content mb-4">
                                                    <!-- Book Icon -->
                                                    <div class="categ-icon mb-2">
                                                        <img src="{{ asset('images/Philosophy.png') }}" alt="Category">
                                                    </div>

                                                    <!-- Book Data -->
                                                    <div class="book-data">
                                                        <p>978-0743273565</p>
                                                        <p class="book-data-title"><b>The Great Gatsby</b></p>
                                                        <p>F.Scott Fitzgerald</p>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="book-actions">
                                                    <button type="button" class="btn-view" onclick="openOverBookModal(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    function openBorReqModal(button) {
        window.location = "{{ route('user.borrow-request') }}"
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