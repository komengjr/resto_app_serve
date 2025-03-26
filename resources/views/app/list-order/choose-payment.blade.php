<div class="card-body">
    <form action="{{ route('list_order_prosess_payment_save') }}" method="post">
        @csrf
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" value="" id="credit-card" checked="checked"
                name="payment-method" />
            <label class="form-check-label mb-2 fs-1" for="credit-card">Cash
            </label>

            <div class="mb-3">
                <input class="form-control" id="inputNumber" type="text" placeholder="•••• •••• •••• ••••" />
            </div>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" value="" id="paypal" name="payment-method" />
            <label class="form-check-label mb-2 fs-1" for="credit-card">Credit Card
            </label>
        </div>
        <div class="row gx-0 ps-2 mb-4">
            <div class="col-sm-8 px-3">
                <div class="mb-3">
                    <input class="form-control" id="inputNumber" name="code" type="text" value="{{$code}}" />
                </div>
                <div class="mb-3">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0" for="inputNumber">Card
                        Number</label>
                    <input class="form-control" id="inputNumber" type="text" placeholder="•••• •••• •••• ••••" />
                </div>
                <div class="row align-items-center">
                    <div class="col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Exp Date</label>
                        <input class="form-control" type="text" placeholder="mm/yyyy" />
                    </div>
                    <div class="col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">CVV<a
                                class="d-inline-block" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Card verification value"><span
                                    class="fa fa-question-circle ms-2"></span></a></label>
                        <input class="form-control" type="text" placeholder="123" maxlength="3"
                            pattern="[0-9]{3}" />
                    </div>
                </div>
            </div>
            <div class="col-4 ps-3 text-center pt-2 d-none d-sm-block">
                <div class="rounded-1 p-2 mt-3 bg-100">
                    <div class="text-uppercase fs--2 fw-bold">We Accept</div><img
                        src="../../assets/img/icons/icon-payment-methods-grid.png" alt="" width="120" />
                </div>
            </div>
        </div>
        {{-- PAYMENT --}}
        <div class="form-check d-flex align-items-center">
            <input class="form-check-input" type="radio" value="" id="paypal" name="payment-method" />
            <label class="form-check-label mb-0 ms-2" for="paypal">
                <button class="btn btn-falcon-primary" id="button-payment-token" data-id="{{$code}}"><span class="fas fa-money-check"></span> Midtrans Payment</button>
            </label>
        </div>
        <div class="border-dashed-bottom my-5"></div>
        <div class="row">
            <div class="col-md-7 col-xl-7 col-xxl-7 px-md-3 mb-xxl-0 position-relative">
                <div class="d-flex"><img class="me-3" src="../../assets/img/icons/shield.png" alt=""
                        width="60" height="60" />
                    <div class="flex-1">
                        <h5 class="mb-2">Buyer Protection</h5>
                        <div class="form-check mb-0">
                            <input class="form-check-input" id="protection-option-1" type="checkbox"
                                checked="checked" />
                            <label class="form-check-label mb-0" for="protection-option-1"> <strong>Full Refund
                                </strong>If you don't <br class="d-none d-md-block d-lg-none" />receive your
                                order</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="protection-option-2" type="checkbox"
                                checked="checked" />
                            <label class="form-check-label mb-0" for="protection-option-2"> <strong>Full or Partial
                                    Refund, </strong>If the product is not as described in details</label>
                        </div><a class="fs--1 ms-3 ps-2" href="#!">Learn More<span class="fas fa-caret-right ms-1"
                                data-fa-transform="down-2"> </span></a>
                    </div>
                </div>
                <div class="vertical-line d-none d-md-block d-xl-block d-xxl-block"> </div>
            </div>
            <div
                class="col-md-5 col-xl-5 col-xxl-5 ps-lg-4 ps-xl-2 ps-xl-5 text-center text-md-start text-xl-center text-xxl-start">
                <div class="border-dashed-bottom d-block d-md-none d-xl-none d-xxl-none my-4"></div>
                <div class="fs-2 fw-semi-bold">All Total: <span class="text-primary">@currency($total)</span></div>
                <button class="btn btn-success mt-3 px-5" type="submit">Confirm &amp; Pay</button>
                <p class="fs--1 mt-3 mb-0">By clicking <strong>Confirm & Pay </strong>button you agree to the <a
                        href="#!">Terms &amp; Conditions</a></p>
            </div>
        </div>
    </form>
</div>
