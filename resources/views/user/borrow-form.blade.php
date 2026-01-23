@extends('layouts.user-borrow-form')
@section('title', 'ISKO-LIB: Student Borrow Book')
@section('content')

<div class="main-container">
    <div class="inner-container">
        <div class="form-card">

            <!-- Header -->
            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/book-borrow.png') }}" class="book-borrow-img mb-2">
                <h2 class="font-extrabold">Borrow a Book</h2>
            </div>

            <!-- Book Selection -->
            <div class="card-field-categ mb-2">
                <label>Book Title</label>
                <input list="booksList" id="bookTitle" class="form-control" placeholder="Type or select a book" required>
                <input type="hidden" name="book_id" id="bookId">
                <datalist id="booksList">
                    @foreach($books as $book)
                    <option data-id="{{ $book->id }}" value="{{ $book->title }}"></option>
                    @endforeach
                </datalist>
            </div>


            <!-- Author & Description -->
            <div class="card-field mb-2">
                <label>Author</label>
                <input id="author" type="text" class="form-control" readonly>
            </div>
            <div class="card-area mb-4">
                <label>Description</label>
                <textarea id="description" rows="4" class="form-control rounded-textarea" readonly></textarea>
            </div>

            <hr class="my-2">
            <label class="font-extrabold">Student Information</label>

            <!-- Student Info -->
            <div class="card-field mb-2">
                <label>Name</label>
                <input type="text" class="form-control" value="{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name }}" readonly>
            </div>
            <div class="card-field mb-4">
                <label>LRN</label>
                <input type="text" class="form-control" value="{{ $user->student_id }}" readonly>
            </div>

            <hr class="my-2">

            <!-- Dates -->
            @php
            $today = now()->toDateString();
            $maxReturn = now()->addWeeks(4)->toDateString();
            @endphp
            <div class="card-field row mb-10">
                <div class="col-md-6">
                    <label>Borrow Date</label>
                    <input type="date" name="borrow_date" class="form-control" value="{{ $today }}" min="{{ $today }}" required>
                </div>

                <div class="col-md-6">
                    <label>Expected Return <i>(Optional)</i></label>
                    <input type="date" name="expected_return" class="form-control" min="{{ $today }}" max="{{ $maxReturn }}">
                </div>
            </div>

            <!-- Actions -->
            <div class="action-buttons">
                <button type="button" class="btn-save" onclick="openFormConfirmModal()">Submit</button>
                <button type="button" class="btn-cancel" onclick="closeBorrowFormModal()">Cancel</button>
            </div>

        </div>
    </div>
</div>

<!-- Include Modals -->
@include('modals.user-borrowform-confirm')
@include('modals.user-borrowform-success')

@endsection

@push('scripts')
<script>
    // Book select -> hidden ID
    const bookTitleInput = document.getElementById('bookTitle');
    const bookIdInput = document.getElementById('bookId');
    const authorInput = document.getElementById('author');
    const descriptionInput = document.getElementById('description');

    bookTitleInput.addEventListener('input', function() {
        const option = [...document.querySelectorAll('#booksList option')]
            .find(o => o.value === this.value);

        if (option) {
            bookIdInput.value = option.dataset.id;

            // Fetch author + description via AJAX
            fetch(`{{ url('/student/book-info') }}/${option.dataset.id}`)
                .then(res => res.json())
                .then(data => {
                    authorInput.value = data.author;
                    descriptionInput.value = data.description;
                })
                .catch(err => console.error(err));
        } else {
            bookIdInput.value = '';
            authorInput.value = '';
            descriptionInput.value = '';
        }
    });

    // Close borrow form
    function closeBorrowFormModal() {
        window.location = "{{ route('user.books') }}";
    }

    // Show confirm modal
    function openFormConfirmModal() {
        const borrowDate = document.querySelector('input[name="borrow_date"]').value;
        const bookId = document.getElementById('bookId').value;

        if (!borrowDate || !bookId) {
            alert('Please select a book and borrow date.');
            return;
        }

        document.getElementById('userBorrowFormConModal').style.display = 'flex';
    }

    // Close confirm modal
    function closeConfirmModal() {
        document.getElementById('userBorrowFormConModal').style.display = 'none';
    }

    // Confirm borrow
    function confirmAdd() {
        const bookId = bookIdInput.value; // Hidden input!
        const borrowDate = document.querySelector('input[name="borrow_date"]').value;
        const returnDate = document.querySelector('input[name="expected_return"]').value || '';

        if (!bookId || !borrowDate) {
            alert('Please fill in all required fields.');
            return;
        }

        fetch("{{ route('user.submit-borrow-form') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    book_id: bookId,
                    borrow_date: borrowDate,
                    expected_return: returnDate
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('userBorrowFormConModal').style.display = 'none';
                    document.getElementById('userBorrowFormSuccessModal').style.display = 'flex';
                } else {
                    alert('Something went wrong. Please try again.');
                }
            })
            .catch(err => {
                console.error(err);
                alert('Something went wrong. Please try again.');
            });
    }


    // Close success modal
    function closeSuccessModal() {
        window.location = "{{ route('user.books') }}";
    }
</script>
@endpush