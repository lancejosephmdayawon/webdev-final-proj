<div id="adminBorrowSuccessModal" class="confirm-overlay" style="display: none;">
    <div class="popup-success">
        <div class="align-center">
            <img src="{{ asset('images/success.png') }}" class="success-img">
        </div>
        <h2 class="my-2">Book Borrowed Successfully!</h2>

        <div class="popup-btn mt-4">
            <button class="btn-confirm-success" onclick="closeSuccessBorrowModal()">Confirm</button>
        </div>
    </div>
</div>

<style>
/* Reuse the same styles as accept-success */
</style>

<script>
function closeSuccessBorrowModal() {
    window.location = "{{ route('admin.transaction') }}";
}
</script>
