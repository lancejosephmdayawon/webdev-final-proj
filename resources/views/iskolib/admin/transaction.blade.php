@extends('layouts.admin-transaction')
@section('title', 'ISKO-LIB: Librarian Transaction')
@section('content')

<div id="transactionsTab" class="main-container">
    <div class="inner-container">
        <div class="top-card d-flex justify-content-between align-items-center mb-2">
            <p class="top-title fw-bold mb-0">Request to Borrow</p>
        </div>

        <!--REQUEST BOOK-->
        <div class="book-card">
            <div class="row g-4 mb-4">

                <!-- SCIENCE & TECHNOLOGY -->
                <div class="col-sm-6 col-lg-2">
                    <div class="st-card position-relative overflow-hidden">
                        <div class="categ-bar">
                            <!-- Category Color -->
                            <div class="st-bar"></div>
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
                            <button type="button" class="btn-view" onclick="openViewModal(this)">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- LITERATURE -->
                <div class="col-sm-6 col-lg-2">
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
                            <button type="button" class="btn-view" onclick="openViewModal(this)">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- SOCIAL STUDIES -->
                <div class="col-sm-6 col-lg-2">
                    <div class="st-card position-relative overflow-hidden">
                        <div class="categ-bar">
                            <!-- Category Color -->
                            <div class="soc-bar"></div>
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
                            <button type="button" class="btn-view" onclick="openViewModal(this)">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- ECONOMICS -->
                <div class="col-sm-6 col-lg-2">
                    <div class="st-card position-relative overflow-hidden">
                        <div class="categ-bar">
                            <!-- Category Color -->
                            <div class="eco-bar"></div>
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
                            <button type="button" class="btn-view" onclick="openViewModal(this)">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- HISTORY -->
                <div class="col-sm-6 col-lg-2">
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
                            <button type="button" class="btn-view" onclick="openViewModal(this)">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- PHILOSOPHY -->
                <div class="col-sm-6 col-lg-2">
                    <div class="st-card position-relative overflow-hidden">
                        <div class="categ-bar">
                            <!-- Category Color -->
                            <div class="phi-bar"></div>
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
                            <button type="button" class="btn-view" onclick="openViewModal(this)">View Details</button>
                        </div>
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

                            <div class="card-book-over">
                                <!-- Date -->
                                <button type="button" class="btn-date-overdue" onclick="openOverdueModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-overdue" onclick="openOverdueModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-overdue" onclick="openOverdueModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-overdue" onclick="openOverdueModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-overdue" onclick="openOverdueModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-overdue" onclick="openOverdueModal(this)">
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

                            <div class="card-book-over">
                                <!-- Date -->
                                <button type="button" class="btn-date-returned" onclick="openReturnedModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-returned" onclick="openReturnedModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-returned" onclick="openReturnedModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-returned" onclick="openReturnedModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-returned" onclick="openReturnedModal(this)">
                                    01/01/26
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
                                <button type="button" class="btn-date-returned" onclick="openReturnedModal(this)">
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
    function openViewModal(button) {
        window.location = "{{ route('admin.borrow-request') }}"
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