@extends('layouts.admin-decline')
@section('title', 'ISKO-LIB: Librarian Book Decline')
@section('content')

@php
// Category metadata inside Blade
$categoryMeta = [
    'Science & Technology' => ['color' => 'st-bar', 'img' => 'SciTech.png'],
    'Literature' => ['color' => 'lit-bar', 'img' => 'Literature.png'],
    'Social Studies' => ['color' => 'soc-bar', 'img' => 'SocStud.png'],
    'Economics' => ['color' => 'eco-bar', 'img' => 'Economics.png'],
    'History' => ['color' => 'his-bar', 'img' => 'History.png'],
    'Philosophy' => ['color' => 'phi-bar', 'img' => 'Philosophy.png'],
];

// Map numeric category_id to name
$categories = [
    1 => 'Science & Technology',
    2 => 'Literature',
    3 => 'Social Studies',
    4 => 'Economics',
    5 => 'History',
    6 => 'Philosophy',
];

$catName = $categories[$req->book->category_id] ?? 'Unknown';
$meta = $categoryMeta[$catName] ?? ['color'=>'','img'=>'default.png'];
@endphp

<div class="main-container">
    <div class="inner-container">
        <div class="form-card">
            <div class="action-close">
                <button class="close-btn" onclick="closeDeclineModal()">&times;</button>
            </div>

            <div class="book-info-card row justify-content-center text-center mb-4">
                <img src="{{ asset('images/' . $meta['img']) }}" class="book-decline-img mb-2">
                <h2 class="font-extrabold">Declined Request</h2>
            </div>

            <div class="card-field mb-2">
                <label>Book Title</label>
                <input type="text" class="form-control" value="{{ $req->book->title }}" readonly>
            </div>

            <div class="card-field mb-2">
                <label>Author</label>
                <input type="text" class="form-control" value="{{ $req->book->author }}" readonly>
            </div>

            <div class="card-area mb-4">
                <label>Description <i>(Optional)</i></label>
                <textarea rows="4" class="form-control rounded-textarea" readonly>{{ $req->book->description }}</textarea>
            </div>

            <hr class="my-2">

            <label class="font-extrabold">Student Information</label>

            <div class="card-field mb-2">
                <label>Name</label>
                <input type="text" class="form-control" value="{{ $req->user->first_name }} {{ $req->user->middle_name }} {{ $req->user->last_name }}" readonly>
            </div>

            <div class="card-field mb-4">
                <label>LRN</label>
                <input type="text" class="form-control" value="{{ $req->user->student_id }}" readonly>
            </div>

            <hr class="my-2">

            <!-- Borrow Dates -->
            <div class="card-field row mb-10">
                <div class="col-md-6">
                    <label>Borrow Date</label>
                    <input type="text" class="form-control"
                        value="{{ $req->borrow_date?->format('F j, Y') }}" readonly>
                </div>
                <div class="col-md-6">
                    <label>Expected Return</label>
                    <input type="text" class="form-control"
                        value="{{ $req->return_date?->format('F j, Y') }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function closeDeclineModal() {
        window.location = "{{ route('admin.transaction') }}";
    }
</script>
@endpush
