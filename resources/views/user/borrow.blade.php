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
                    @php
                    $today = now()->toDateString();
                    @endphp
                    <div class="card-field row mb-10">
                        <div class="col-md-6">
                            <label>Borrow Date</label>
                            <input type="date" id="borrow_date" name="borrow_date" class="form-control" value="{{ $today }}" min="{{ $today }}" required>
                        </div>

                        <div class="col-md-6">
                            <label>Expected Return <i>(Optional)</i></label>
                            <input type="date" id="expected_return" name="expected_return" class="form-control">
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

    // Set max expected return date based on borrow date
    const borrowDateInput = document.getElementById('borrow_date');
    const expectedReturnInput = document.getElementById('expected_return');

    function updateExpectedReturnLimits() {
        const borrowDate = borrowDateInput.value;
        if (!borrowDate) return;

        const borrow = new Date(borrowDate);

        // Set minimum to borrow date
        const minDate = borrow;
        const minY = minDate.getFullYear();
        const minM = String(minDate.getMonth() + 1).padStart(2, '0');
        const minD = String(minDate.getDate()).padStart(2, '0');
        expectedReturnInput.min = `${minY}-${minM}-${minD}`;

        // Set maximum to 4 weeks after borrow date
        const maxDate = new Date(borrow);
        maxDate.setDate(maxDate.getDate() + 28);
        const maxY = maxDate.getFullYear();
        const maxM = String(maxDate.getMonth() + 1).padStart(2, '0');
        const maxD = String(maxDate.getDate()).padStart(2, '0');
        expectedReturnInput.max = `${maxY}-${maxM}-${maxD}`;

        // Optional: reset current value if outside new limits
        if (expectedReturnInput.value) {
            const val = new Date(expectedReturnInput.value);
            if (val < minDate || val > maxDate) {
                expectedReturnInput.value = '';
            }
        }
    }

    // Run on page load
    updateExpectedReturnLimits();

    // Update whenever borrow date changes
    borrowDateInput.addEventListener('change', updateExpectedReturnLimits);
</script>
@endpush