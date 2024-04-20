<div class="modal-content" wire:ignore.self>
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="rejectBookingModalLabel">Credit Card Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <ul style="list-style: none">
            <li>
                <h4>Card Number: <small>{{ $card_number }}</small> </h4>
                <h4>Expiry Month: <small>{{ $expiry_month }}</small> </h4>
                <h4>Expiry Year: <small>{{ $expiry_year }}</small> </h4>
                <h4>cvc: <small>{{ $cvc }}</small> </h4>
            </li>
        </ul>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark text-white btn-block" data-bs-dismiss="modal">No</button>
    </div>
</div>
