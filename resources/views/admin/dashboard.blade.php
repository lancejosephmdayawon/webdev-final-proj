@extends('layouts.admin-dashboard')
@section('title', 'ISKO-LIB: Librarian Dashboard')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <!--GREETING CARD-->
            <div class="greet-card mb-4">
                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-6 col-lg-9 mb-2">
                        <div class="top-text">
                            <p class="top-title fw-bold mb-0">Greetings, Librarian!</p>
                            <p class="top-detail mb-0">
                                Greetings from the library! This academic institutions acts as
                                a research and study hub, allowing users to engage intellectually
                                through access to the materials that support what you need.
                                Librarian offers professional assistance, select collections,
                                and encourage the use of information in a correct and ethical way.
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 d-flex justify-content-center">
                        <img src="{{ asset('images/lib-greet.png') }}" class="lib-greet">
                    </div>
                </div>
            </div>


            <!--REPORT DASHBOARD-->

            <div class="report-card row">
                <div class="col-sm-6 col-lg-4">
                    <div class="avail-card d-flex align-items-center mb-4">
                        <img src="{{ asset('images/avail.png') }}" class="icon-mid mr-6">
                        <div class="mid-content">
                            <p class="mid-title fw-bold mb-1">Available Books</p>
                            <p class="mid-detail">
                                <b>{{ $availableBooks }}</b><br>out of {{ $totalBooks }} total books
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="borrow-card d-flex align-items-center mb-4">
                        <img src="{{ asset('images/borrow.png') }}" class="icon-mid mr-6">
                        <div class="mid-content">
                            <p class="mid-title fw-bold mb-1">Borrowed Books</p>
                            <p class="mid-detail">
                                <b>{{ $borrowedBooks }}</b><br>out of {{ $totalBooks }} total books
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="overdue-card d-flex align-items-center mb-4">
                        <img src="{{ asset('images/overdue.png') }}" class="icon-mid mr-6">
                        <div class="mid-content">
                            <p class="mid-title fw-bold mb-1">Overdue Books</p>
                            <p class="mid-detail">
                                <b>{{ $overdueBooks }}</b><br>out of {{ $borrowedBooks }} borrowed books
                            </p>
                        </div>
                    </div>
                </div>
            </div>



            <!--BOOK STATUS TABLE-->
            <div class="book-status mb-4">
                <p class="bot-title fw-bold mb-2">Book Inventory Status</p>

                <div class="table-res">
                    <!-- DYNAMIC TABLE -->
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
                            @foreach($books as $book)
                            <tr>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->category->name ?? 'N/A' }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>
                                    @if($book->stock_qty > 0)
                                    <span class="avail-badge">Available</span>
                                    @else
                                    <span class="notavail-badge">Not Available</span>
                                    @endif
                                </td>
                                <td>{{ $book->stock_qty }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection