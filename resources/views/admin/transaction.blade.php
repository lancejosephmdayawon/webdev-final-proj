@extends('layouts.admin-transaction')
@section('title', 'ISKO-LIB: Librarian Transaction')
@section('content')

<div id="transactionsTab" class="main-container">
    <div class="inner-container">

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
                                            <span><b>{{ $request->request_date->format('d/m/y') }}</b></span>
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
                        <div class="top-card d-flex justify-content-between align-items-center mb-2">
                            <p class="top-title-decline fw-bold mb-0">Declined Request</p>
                        </div>

                        @if($declinedRequests->count())
                        @foreach($declinedRequests as $req)
                        @php
                        // Get category name from category_id
                        $catName = $categories[$req->book->category_id] ?? 'Unknown';
                        // Get metadata from categoryMeta array
                        $meta = $categoryMeta[$catName] ?? ['color'=>'default-bar','img'=>'default.png'];
                        @endphp

                        <div class="card-data-book" data-id="{{ $req->id }}" onclick="openDeclineModal(this)">

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
                                <p class="card-book-date">{{ \Carbon\Carbon::parse($req->request_date)->format('m/d/y') }}</p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="text-muted">No declined requests.</p>
                        @endif
                    </div>
                </div>


            </div>
        </div>

        <div class="bottom-card">
            <div class="row g-4 mb-4">
                <!--BORROWED BOOKS-->
                <div class="col-sm-12 col-lg-4">
                    <div class="borrow-card">
                        <p class="bot-title fw-bold mb-0">Borrowed Books</p>

                        <!--Science & Technology-->
                        <div class="card-data-book position-relative overflow-hidden mb-2">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="st-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/SciTech.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <p class="card-book-date">01/01/26</p>
                                <button type="button" class="btn-details" onclick="openDetailsModal(this)">
                                    Details
                                </button>
                            </div>
                        </div>

                        <!--Literature-->
                        <div class="card-data-book position-relative overflow-hidden mb-2">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="lit-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Literature.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <p class="card-book-date">01/01/26</p>
                                <button type="button" class="btn-details" onclick="openDetailsModal(this)">
                                    Details
                                </button>
                            </div>
                        </div>

                        <!--Social Studies-->
                        <div class="card-data-book position-relative overflow-hidden mb-2">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="soc-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/SocStud.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <p class="card-book-date">01/01/26</p>
                                <button type="button" class="btn-details" onclick="openDetailsModal(this)">
                                    Details
                                </button>
                            </div>
                        </div>

                        <!--Economics-->
                        <div class="card-data-book position-relative overflow-hidden mb-2">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="eco-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Economics.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <p class="card-book-date">01/01/26</p>
                                <button type="button" class="btn-details" onclick="openDetailsModal(this)">
                                    Details
                                </button>
                            </div>
                        </div>

                        <!--History-->
                        <div class="card-data-book position-relative overflow-hidden mb-2">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="his-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/History.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <p class="card-book-date">01/01/26</p>
                                <button type="button" class="btn-details" onclick="openDetailsModal(this)">
                                    Details
                                </button>
                            </div>
                        </div>

                        <!--Philosophy-->
                        <div class="card-data-book position-relative overflow-hidden mb-2">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="phi-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Philosophy.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <p class="card-book-date">01/01/26</p>
                                <button type="button" class="btn-details" onclick="openDetailsModal(this)">
                                    Details
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <!--OVERDUE BOOKS-->
                <div class="col-sm-12 col-lg-4">
                    <div class="overdue-card">
                        <p class="bot-title fw-bold mb-0">Overdue Books</p>

                        <!--Science & Technology-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openOverdueModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="st-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/SciTech.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-over">
                                <!-- Date -->
                                <button type="button" class="btn-date-overdue">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--Literature-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openOverdueModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="lit-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Literature.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-overdue">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--Social Studies-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openOverdueModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="soc-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/SocStud.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-overdue">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--Economics-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openOverdueModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="eco-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Economics.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-overdue">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--History-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openOverdueModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="his-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/History.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-overdue">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--Philosophy-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openOverdueModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="phi-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Philosophy.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-overdue">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <!--RETURNED BOOKS-->
                <div class="col-sm-12 col-lg-4">
                    <div class="returned-card">
                        <p class="bot-title fw-bold mb-0">Returned Books</p>

                        <!--Science & Technology-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openReturnedModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="st-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/SciTech.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-over">
                                <!-- Date -->
                                <button type="button" class="btn-date-returned">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--Literature-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openReturnedModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="lit-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Literature.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-returned">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--Social Studies-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openReturnedModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="soc-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/SocStud.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-returned">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--Economics-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openReturnedModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="eco-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Economics.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-returned">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--History-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openReturnedModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="his-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/History.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-returned">
                                    01/01/26
                                </button>
                            </div>
                        </div>

                        <!--Philosophy-->
                        <div class="card-data-book position-relative overflow-hidden mb-2" onclick="openReturnedModal(this)">
                            <!-- Category Color -->
                            <div class="categ-bar">
                                <!-- Category Color -->
                                <div class="phi-bar"></div>
                            </div>

                            <!-- Category Image -->
                            <div class="circle">
                                <img src="{{ asset('images/Philosophy.png') }}" class="categ-img">
                            </div>

                            <!-- Book Details -->
                            <div class="card-book-info">
                                <p class="card-book-title">The Great Gatsby</p>
                                <p class="card-book-author">F.Scott Fitzgerald</p>
                            </div>

                            <div class="card-book-right">
                                <!-- Date -->
                                <button type="button" class="btn-date-returned">
                                    01/01/26
                                </button>
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


    function openDetailsModal(button) {
        window.location = "{{ route('admin.borrowed-book') }}"
    }

    function openOverdueModal(button) {
        window.location = "{{ route('admin.overdue-book') }}"
    }

    function openReturnedModal(button) {
        window.location = "{{ route('admin.returned-book') }}"
    }
</script>
@endpush