@extends('layouts.user-borrow')
@section('title', 'ISKO-LIB: Student Borrow Book')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="container">
            <div class="form-card">
                <div class="book-info-card row justify-content-center text-center mb-4">
                    <img src="{{ asset('images/book-borrow.png') }}" class="book-borrow-img mb-2">
                    <h2 class="font-extrabold">Borrow a Book</h2>
                </div>

                <form id="borrowForm">
                    @csrf

                    <!-- Book Info -->
                    <div class="card-field mb-2">
                        <label>Book Title</label>
                        <input type="text" class="form-control" value="{{ $book->title }}" readonly>
                    </div>

                    <div class="card-field mb-2">
                        <label>Author</label>
                        <input type="text" class="form-control" value="{{ $book->author }}" readonly>
                    </div>

                    <div class="card-area mb-4">
                        <label>Description <i>(Optional)</i></label>
                        <textarea rows="4" class="form-control rounded-textarea" readonly>{{ $book->description }}</textarea>
                    </div>

                    <hr class="my-2">

                    <!-- Student Info -->
                    <label class="font-extrabold">Student Information</label>

                    <div class="card-field mb-2">
                        <label>Name</label>
                        <input type="text" class="form-control"
                            value="{{ auth()->user()->first_name }} {{ auth()->user()->middle_name }} {{ auth()->user()->last_name }}"
                            readonly>
                    </div>

                    <div class="card-field mb-4">
                        <label>LRN</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->student_id }}" readonly>
                    </div>

                    <hr class="my-2">

                    <!-- Dates -->
                    <div class="card-field row mb-10">
                        <div class="col-md-6">
                            <label>Borrow Date</label>
                            <input type="date" name="borrow_date" class="form-control"
                                value="{{ now()->toDateString() }}"
                                min="{{ now()->toDateString() }}"
                                required>
                        </div>

                        @php
                        $today = now()->toDateString();
                        $maxReturn = now()->addWeeks(4)->toDateString();
                        @endphp

                        <div class="col-md-6">
                            <label>Expected Return <i>(Optional)</i></label>
                            <input type="date" name="expected_return" class="form-control"
                                min="{{ $today }}"
                                max="{{ $maxReturn }}">
                        </div>

                    </div>

                    <div class="action-buttons">
                        <button type="button" class="btn-save" onclick="openConfirmModal()">Submit</button>
                        <button type="button" class="btn-cancel" onclick="closeBorrowModal()">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('modals.user-borrow-confirm')
@include('modals.user-borrow-success')

@endsection

@push('scripts')
<script>
    function openConfirmModal() {
        document.getElementById('userBorrowConModal').style.display = 'flex';
    }

    function closeBorrowModal() {
        window.location = "{{ route('user.home') }}";
    }

    function confirmAdd() {
        const form = document.getElementById('borrowForm');
        const formData = new FormData(form);
        const url = "{{ route('user.submit-borrow', $book->id) }}";

        fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => {
                if (!res.ok) throw res; // throw if status not 200
                return res.json();
            })
            .then(data => {
                if (data.success) {
                    document.getElementById('userBorrowConModal').style.display = 'none';
                    document.getElementById('userBorrowSuccessModal').style.display = 'flex';
                } else if (data.errors) {
                    alert(Object.values(data.errors).join("\n"));
                } else {
                    alert('Something went wrong. Please try again.');
                }
            })
            .catch(async err => {
                if (err.json) {
                    const errorData = await err.json();
                    if (errorData.errors) {
                        alert(Object.values(errorData.errors).flat().join("\n"));
                        return;
                    }
                }
                alert('Something went wrong. Please try again.');
                console.error(err);
            });
    }

    function closeConfirmModal() {
        document.getElementById('userBorrowConModal').style.display = 'none';
    }

    function closeSuccessModal() {
        window.location = "{{ route('user.home') }}";
    }
</script>
@endpush