@extends('layouts.lay-welcome')
@section('title', 'Welcome to ISKO-LIB!')
@section('content')

<div class="min-h-screen">
    <div class="page-wrapper">

        <img src="{{ asset('images/PUPLogo.png') }}" class="pup-logo-wel mb-6">

        <h1 class="text-6xl font-black mb-4">ISKO-LIB</h1>
        <p class="text-xl text-gray-600 mb-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        <div class="card-wrapper">
            <!-- LIBRARIAN BUTTON -->
            <div class="lib-card">
                <img src="{{ asset('images/librarian-icon.png') }}" class="role-img">
                <a href="{{ route('iskolib.login') }}" class="role-btn w-full">Librarian</a>
            </div>

            <!-- STUDENT BUTTON -->
            <div class="stud-card">
                <img src="{{ asset('images/student-icon.png') }}" class="role-img">
                <a href="{{ route('iskolib.login') }}" class="role-btn w-full">Student</a>
            </div>
        </div>

    </div>
</div>

@endsection