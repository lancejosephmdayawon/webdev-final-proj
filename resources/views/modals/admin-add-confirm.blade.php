<div id="addConModal" class="confirm-overlay" style="display: none;">
    <div class="popup-confirm">
        <div class="align-center">
            <img src="{{ asset('images/add-con.png') }}" class="add-con-img">
        </div>
        <h2 class="my-2">Are you sure you want to add this book?</h2>

        <div class="popup-btn mt-4">
            <button class="btn-confirm" onclick="confirmAdd()">Confirm</button>
            <button class="btn-cancel" onclick="closeConfirmModal()">Cancel</button>
        </div>
    </div>
</div>

<style>
    :root {
        --color-maroon: #800000;
        --color-yellow: #ffdf00;
        --color-light-maroon: #b30000;
        --color-light-yellow: #ffe74d;
    }

    body {
        font-family: "Roboto", sans-serif;
    }

    .confirm-overlay {
        position: fixed;
        inset: 0;
        background: rgb(0, 0, 0, 0.50);
        backdrop-filter: blur(10px);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }


    .popup-confirm {
        position: relative;
        background: #FFFFFF;
        color: var(--color-maroon);
        width: 330px;
        height: 230px;
        padding: 20px;
        border-radius: 30px;
        text-align: center;

        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
    }

    .popup-confirm h2 {
        font-size: 20px;
        font-weight: bold;
    }

    .add-con-img {
        width: 80px;
        height: 80px;
        padding: 0.25rem;
    }

    .popup-btn {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 16px;
    }

    .btn-confirm,
    .btn-cancel {
        width: 110px;
        padding: 5px;
        border-radius: 10px;
        border: 2px solid;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;

        position: relative;
        top: 0;
        display: inline-block;

        box-shadow: 0 0 5px rgba(0, 0, 0, 0.25);
        transition: all 0.3s ease;
    }

    .btn-confirm {
        color: var(--color-maroon);
        background-color: var(--color-yellow);
        border-color: var(--color-maroon);
    }

    .btn-cancel {
        color: var(--color-yellow);
        background-color: var(--color-maroon);
        border-color: var(--color-yellow);
    }

    .btn-confirm:hover,
    .btn-cancel:hover {
        transform: scale(1.03);
    }

    .btn-confirm:active,
    .btn-cancel:active {
        top: 3px;
    }

    .btn-confirm:active {
        box-shadow: 0 2px 0px var(--color-yellow);
    }

    .btn-cancel:active {
        box-shadow: 0 2px 0px var(--color-maroon);
    }
</style>

<script>
    function confirmAdd() {
        document.getElementById('addConModal').style.display = 'none';
        document.getElementById('addSuccessModal').style.display = 'flex';
    }

    function closeConfirmModal() {
        document.getElementById('addConModal').style.display = 'none';
    }
</script>