@extends('layouts.admin-dashboard')
@section('title', 'ISKO-LIB: Librarian Dashboard')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="greet-card mb-4">
            <div class="d-flex align-items-center gap-4">
                <div class="flex-grow-1">
                    <div class="top-text">
                        <p class="top-title fw-bold mb-0">Greetings, Librarian!</p>
                        <p class="top-detail mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/lib-greet.png') }}" class="lib-greet" alt="Librarian greeting">
                </div>
            </div>
        </div>

        <div class="report-card row">
            <div class="col-sm-4">
                <div class="avail-card d-flex align-items-center mb-4">
                    <img src="{{ asset('images/avail.png') }}" class="icon-mid mr-6">
                    <div>
                        <p class="mid-title fw-bold mb-1">Available Books</p>
                        <p class="mid-detail">
                            <b>123</b><br>out of total books
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="borrow-card d-flex align-items-center mb-4">
                    <img src="{{ asset('images/borrow.png') }}" class="icon-mid mr-6">
                    <div>
                        <p class="mid-title fw-bold mb-1">Borrowed Books</p>
                        <p class="mid-detail">
                            <b>123</b><br>out of total books
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="overdue-card d-flex align-items-center mb-4">
                    <img src="{{ asset('images/overdue.png') }}" class="icon-mid mr-6">
                    <div>
                        <p class="mid-title fw-bold mb-1">Overdue Books</p>
                        <p class="mid-detail">
                            <b>123</b><br>out of total books
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="book-status mb-4">
            <p class="bot-title fw-bold mb-2">Book Inventory Status</p>

            <div class="table-res">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ISBN</th>
                            <th scope="col">Category</th>
                            <th scope="col">Book Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                            <th scope="col">Stock</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>978-0743273565</td>
                            <td>Fantasy</td>
                            <td>The Great Gatsby</td>
                            <td>F.Scott Fitzgerald</td>
                            <td><span class="avail-badge">Available</span></td>
                            <td>2</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>978-0743273565</td>
                            <td>Fantasy</td>
                            <td>The Great Gatsby</td>
                            <td>F.Scott Fitzgerald</td>
                            <td><span class="notavail-badge">Not Available</span></td>
                            <td>0</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>978-0743273565</td>
                            <td>Fantasy</td>
                            <td>The Great Gatsby</td>
                            <td>F.Scott Fitzgerald</td>
                            <td><span class="avail-badge">Available</span></td>
                            <td>2</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>978-0743273565</td>
                            <td>Fantasy</td>
                            <td>The Great Gatsby</td>
                            <td>F.Scott Fitzgerald</td>
                            <td><span class="notavail-badge">Not Available</span></td>
                            <td>0</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>978-0743273565</td>
                            <td>Fantasy</td>
                            <td>The Great Gatsby</td>
                            <td>F.Scott Fitzgerald</td>
                            <td><span class="avail-badge">Available</span></td>
                            <td>2</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>978-0743273565</td>
                            <td>Fantasy</td>
                            <td>The Great Gatsby</td>
                            <td>F.Scott Fitzgerald</td>
                            <td><span class="notavail-badge">Not Available</span></td>
                            <td>0</td>
                        </tr>
                    </tbody>




                </table>
            </div>

        </div>
    </div>

</div>

@endsection