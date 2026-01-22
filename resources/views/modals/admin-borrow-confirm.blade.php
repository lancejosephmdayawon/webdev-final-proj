<div id="adminBorrowConModal" class="confirm-overlay" style="display: none;">
    <div class="popup-confirm">
        <div class="align-center">
            <img src="{{ asset('images/add-con.png') }}" class="add-con-img">
        </div>
        <h2 class="my-2">Are you sure you want to mark this book as borrowed?</h2>

        <div class="popup-btn mt-4">
            <button class="btn-confirm" onclick="confirmBorrow()">Confirm</button>
            <button class="btn-cancel" onclick="closeConfirmBorrowModal()">Cancel</button>
        </div>
    </div>
</div>

<style>
/* Reuse the same styles as accept-confirm */
</style>

<script>
function confirmBorrow() {
    const transactionId = document.getElementById('adminBorrowConModal').dataset.transactionId;

    fetch(`/librarian/borrow-book/${transactionId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({})
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            document.getElementById('adminBorrowConModal').style.display = 'none';
            document.getElementById('adminBorrowSuccessModal').style.display = 'flex';
        } else {
            alert(data.message || "Failed to mark book as borrowed.");
        }
    })
    .catch(err => console.error(err));
}

function closeConfirmBorrowModal() {
    document.getElementById('adminBorrowConModal').style.display = 'none';
}
</script>
