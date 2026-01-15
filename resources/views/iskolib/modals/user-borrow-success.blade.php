<div id="userBorrowSuccessModal" class="confirm-overlay" style="display: none;">
    <div class="popup-success">
        <div class="align-center">
            <img src="{{ asset('images/success.png') }}" class="success-img">
        </div>
        <h2 class="my-2">Book Borrowed Successfully!</h2>

        <div class="popup-btn mt-4">
            <button class="btn-confirm-success" onclick="closeSuccessModal()">Confirm</button>
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


    .popup-success {
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

    .popup-success h2 {
        font-size: 25px;
        font-weight: bold;
    }

    .success-img {
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

    .btn-confirm-success {
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

    .btn-confirm-success {
        color: var(--color-maroon);
        background-color: var(--color-yellow);
        border-color: var(--color-maroon);
    }

    .btn-confirm-success:hover {
        transform: scale(1.03);
    }

    .btn-confirm-success:active {
        top: 3px;
    }

    .btn-confirm-success:active {
        box-shadow: 0 2px 0px var(--color-yellow);
    }
</style>

<script>
    function closeSuccessModal() {
        window.location = "{{ route('iskolib.user.home') }}";
    }
</script>