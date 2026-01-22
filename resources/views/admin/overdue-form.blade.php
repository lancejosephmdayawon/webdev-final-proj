@extends('layouts.admin-overdue') {{-- reuse your form layout --}}
@section('title', 'ISKO-LIB: Librarian Unborrowed Book')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="form-card">
            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/borrow.png') }}" class="book-return-img mb-2">
                <h2 class="font-extrabold">Unborrowed Book</h2>
            </div>

            {{-- Book Information --}}
            <div class="card-field mb-2">
                <label>Book Title</label>
                <input type="text" class="form-control" value="{{ $transaction->borrowRequest->book->title }}" readonly>
            </div>

            <div class="card-field mb-2">
                <label>Author</label>
                <input type="text" class="form-control" value="{{ $transaction->borrowRequest->book->author }}" readonly>
            </div>

            <div class="card-area mb-4">
                <label>Description <i>(Optional)</i></label>
                <textarea rows="4" class="form-control rounded-textarea" readonly>{{ $transaction->borrowRequest->book->description }}</textarea>
            </div>

            <hr class="my-2">

            {{-- Student Information --}}
            <label class="font-extrabold">Student Information</label>

            <div class="card-field mb-2">
                <label>Name</label>
                <input type="text" class="form-control" value="{{ $transaction->borrowRequest->user->first_name }} {{ $transaction->borrowRequest->user->last_name }}" readonly>
            </div>

            <div class="card-field mb-4">
                <label>Student ID</label>
                <input type="text" class="form-control" value="{{ $transaction->borrowRequest->user->student_id }}" readonly>
            </div>

            <hr class="my-2">

            {{-- Borrow Dates --}}
            <div class="card-field row mb-10">
                <div class="col-md-6">
                    <label>Request Date</label>
                    <input type="date" class="form-control" value="{{ $transaction->borrowRequest->request_date->format('Y-m-d') }}" readonly>
                </div>

                <div class="col-md-6">
                    <label>Expected Return</label>
                    <input type="date" class="form-control" value="{{ $transaction->borrowRequest->return_date?->format('Y-m-d') }}" readonly>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="action-buttons">
                <form action="{{ route('admin.borrow-book', $transaction->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-save">Borrowed</button>
                </form>

                <a href="{{ route('admin.transaction') }}" class="btn-cancel">Back</a>
            </div>

        </div>
    </div>
</div>
@endsection
