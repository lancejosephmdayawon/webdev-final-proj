@extends('layouts.lay-welcome')
@section('title', 'Welcome to ISKO-LIB!')

@section('content')
<div class="page-wrapper">
    <div class="container text-center">

        <!-- HEADER -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8">
                <div class="welcome-header mb-4">
                    <img src="{{ asset('images/PUPLogo.png') }}" class="pup-logo-wel mb-2">
                    <h1 class="fw-bold display-3 text-maroon mb-2">ISKO-LIB</h1>
                    <p class="text-xl text-gray-600">
                        Welcome to ISKO-LIB! Your gateway to academic resources and learning.
                    </p>
                </div>
            </div>
        </div>

        <!-- CARDS -->
        <div class="card-wrapper">
            <div class="lib-card">
                <img src="{{ asset('images/librarian-icon.png') }}" class="role-img">
                <a href="{{ route('login') }}" class="role-btn mt-3">Librarian</a>
            </div>

            <div class="stud-card">
                <img src="{{ asset('images/student-icon.png') }}" class="role-img">
                <a href="{{ route('login') }}" class="role-btn mt-3">Student</a>
            </div>
        </div>

    </div>
</div>
@endsection