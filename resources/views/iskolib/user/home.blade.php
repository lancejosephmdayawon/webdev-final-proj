@extends('layouts.user-home')
@section('title', 'ISKO-LIB: Student Home')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="greet-card mb-4">
            <div class="d-flex align-items-center gap-4">
                <div class="row flex-grow-1">
                    <div class="top-text">
                        <p class="top-title fw-bold mb-0">Greetings, Student!</p>
                        <p class="top-detail mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/stu-greet.png') }}" class="stu-greet" alt="Librarian greeting">
                </div>
            </div>
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

        <div class="book-card">
            <!-- BOOK ROW 1-->
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
                            <!-- Availability -->
                            <span class="avail-label">Available</span>
                            <span><b>QTY: #</b></span>
                        </div>
                        <!-- Book Content -->
                        <div class="book-content mb-4">
                            <!-- Book Icon -->
                            <div class="categ-icon mb-2">
                                <img src="{{ asset('images/SciTech.png') }}" alt="Category">
                            </div>

                            <!-- Book Data -->
                            <div class="book-data">
                                <p>978-0743273565</p>
                                <p><b>The Great Gatsby</b></p>
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
                            <!-- Availability -->
                            <span class="notavail-label">Not Available</span>
                            <span><b>QTY: #</b></span>
                        </div>
                        <!-- Book Content -->
                        <div class="book-content mb-4">
                            <!-- Book Icon -->
                            <div class="categ-icon mb-2">
                                <img src="{{ asset('images/Literature.png') }}" alt="Category">
                            </div>

                            <!-- Book Data -->
                            <div class="book-data">
                                <p>978-0743273565</p>
                                <p><b>The Great Gatsby</b></p>
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
                            <!-- Availability -->
                            <span class="avail-label">Available</span>
                            <span><b>QTY: #</b></span>
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
                                <p><b>The Great Gatsby</b></p>
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
                            <!-- Availability -->
                            <span class="notavail-label">Not Available</span>
                            <span><b>QTY: #</b></span>
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
                                <p><b>The Great Gatsby</b></p>
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
                            <!-- Availability -->
                            <span class="avail-label">Available</span>
                            <span><b>QTY: #</b></span>
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
                                <p><b>The Great Gatsby</b></p>
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
                            <!-- Availability -->
                            <span class="notavail-label">Not Available</span>
                            <span><b>QTY: #</b></span>
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
                                <p><b>The Great Gatsby</b></p>
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
    </div>
</div>

@endsection

@push('scripts')
<script>
    function openViewModal(button) {
        window.location = "{{ route('iskolib.user.book-details') }}"
    }
</script>
@endpush