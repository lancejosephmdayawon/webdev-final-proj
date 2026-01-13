@extends('layouts.admin-inventory')
@section('title', 'ISKO-LIB: Librarian Inventory')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="top-card d-flex justify-content-between align-items-center mb-4">
            <p class="top-title fw-bold mb-0">Book Inventory</p>
            <a href="#" class="add-btn">Add</a>
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

        <div class="book-card mt-4 mb-4">
            <div class="row g-4">

                <div class="col-sm-6 col-lg-2">
                    <div class="st-card ">
                        
                    </div>
                </div>

            </div>
        </div>

        

    </div>
</div>
@endsection