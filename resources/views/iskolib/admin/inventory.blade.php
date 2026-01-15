@extends('layouts.admin-inventory')
@section('title', 'ISKO-LIB: Librarian Inventory')
@section('content')

<div id="inventoryTab" class="main-container">
    <div class="inner-container">
        <div class="top-card d-flex justify-content-between align-items-center mb-4">
            <p class="top-title fw-bold mb-0">Book Inventory</p>
            <a href="{{ route('iskolib.admin.add-book') }}" class="add-btn">Add</a>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- BOOK ROW 2-->
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
                            <button type="button" class="btn-edit" onclick="openEditModal(this)">Edit</button>
                            <button type="button" class="btn-delete" onclick="openDeleteModal(this)">Delete</button>
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
    function openEditModal(button) {
        window.location = "{{ route('iskolib.admin.update-book') }}"
    }

    function openDeleteModal() {
        const modal = document.getElementById('delConModal');
        modal.style.display = 'flex';
    }
</script>
@endpush