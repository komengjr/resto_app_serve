<div class="card mb-3" id="detail">
    <div class="card-header bg-light btn-reveal-trigger d-flex flex-between-center">
        <h5 class="mb-0">No Order : {{ date('YmdHis') }}</h5>
        <input type="text" name="no_order" value="{{ date('YmdHis') }}" id="no_order" hidden>
        <button class="btn btn-falcon-default btn-sm btn-reveal text-600" href="#"><span
                class="fas fa-pencil-alt"></span>
        </button>
    </div>
    <div id="menu-table-order">


    </div>

</div>
<div class="card">
    <div class="card-header bg-light">
        <h5 class="mb-0">Payment Method</h5>
    </div>
    <div class="card-body">
            <div class="row">
                <div class="col-md-5 col-xl-12 col-xxl-5 ps-lg-4 ps-xl-2 ps-xxl-5 text-center text-md-start text-xl-center text-xxl-start">
                    <button class="btn btn-success mt-3 px-5" data-bs-toggle="modal" data-bs-target="#modal-order" id="button-confrim-order">Confirm &amp; Pay</button>
                    <p class="fs--1 mt-3 mb-0">By clicking <strong>Confirm & Pay </strong>button you agree to
                        the <a href="#!">Terms &amp; Conditions</a></p>
                </div>
            </div>
    </div>
</div>

