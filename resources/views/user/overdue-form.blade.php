@extends('layouts.user-borrowreq')
@section('title', 'ISKO-LIB: Student Overdue Book')

@section('content')
<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="form-card">

                <div class="action-close">
                    <button class="close-btn" onclick="closeOverdueModal()">&times;</button>
                </div>

                <div class="book-info-card row justify-content-center text-center mb-4">
                    <img src="{{ asset('images/book-overdue.png') }}" class="book-overdue-img mb-2">
                    <h2 class="font-extrabold">Overdue Book</h2>
                </div>

                {{-- BOOK INFO --}}
                <div class="card-field mb-2">
                    <label>Book Title</label>
                    <input type="text"
                        class="form-control"
                        value="{{ $overdueBook->book->title }}"
                        readonly>
                </div>

                <div class="card-field mb-2">
                    <label>Author</label>
                    <input type="text"
                        class="form-control"
                        value="{{ $overdueBook->book->author }}"
                        readonly>
                </div>

                <div class="card-area mb-4">
                    <label>Description <i>(Optional)</i></label>
                    <textarea rows="4"
                        class="form-control rounded-textarea"
                        readonly>{{ $overdueBook->book->description }}</textarea>
                </div>

                <hr class="my-2">

                {{-- STUDENT INFO --}}
                <label class="font-extrabold">Student Information</label>

                <div class="card-field mb-2">
                    <label>Name</label>
                    <input type="text"
                        class="form-control"
                        value="{{ trim($overdueBook->user->first_name . ' ' . $overdueBook->user->middle_name . ' ' . $overdueBook->user->last_name) }}"
                        readonly>
                </div>


                <div class="card-field mb-4">
                    <label>LRN</label>
                    <input type="text"
                        class="form-control"
                        value="{{ $overdueBook->user->student_id ?? 'N/A' }}"
                        readonly>
                </div>

                <hr class="my-2">

                {{-- DATES --}}
                <div class="card-field row mb-10">
                    <div class="col-md-4">
                        <label>Date Borrowed</label>
                        <input type="text"
                            class="form-control"
                            value="{{ \Carbon\Carbon::parse($overdueBook->borrow_date)->format('F j, Y') }}"
                            readonly>
                    </div>

                    <div class="col-md-4">
                        <label>Expected Return</label>
                        <input type="text"
                            class="form-control"
                            value="{{ \Carbon\Carbon::parse($overdueBook->return_date)->format('F j, Y') }}"
                            readonly>
                    </div>

                    @php
                    $daysOverdue = 0;

                    if ($overdueBook->return_date) {
                    // Convert to seconds
                    $return = strtotime($overdueBook->return_date);
                    $now = strtotime(date('Y-m-d'));
                    $diff = $now - $return;
                    $daysOverdue = $diff > 0 ? floor($diff / 86400) : 0; // 86400 seconds in a day
                    }
                    @endphp

                    <div class="col-md-4">
                        <label>Days Overdue</label>
                        <input type="text" class="form-control bg-red-300 font-semibold"
                            value="{{ $daysOverdue }} {{ $daysOverdue < 2 ? 'day' : 'days' }}" readonly>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    function closeOverdueModal() {
        window.location = "{{ route('user.books') }}";
    }
</script>
@endpush