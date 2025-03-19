@extends('layouts.base')
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5 class="mb-2">Stok Management</h5>

                </div>
                <div class="col-auto d-none d-sm-block">
                    <button class="btn btn-falcon-default btn-sm" data-bs-toggle="modal" data-bs-target="#modal-stok">
                        <span class="fas fa-search fs--2 me-1"></span> Cari Data</button>
                </div>
            </div>
        </div>
        <div class="card-body border-top">
            <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
                <div class="flex-1">
                    <p class="mb-0">Customer was created</p>
                    <p class="fs--1 mb-0 text-600">Jan 12, 11:13 PM</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Details</h5>
                </div>
                <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="#!"><span
                            class="fas fa-pencil-alt fs--2 me-1"></span>Update details</a></div>
            </div>
        </div>
        <div class="card-body bg-light border-top">
            <div class="row">
                <div class="col-lg col-xxl-5">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">Account Information</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">ID</p>
                        </div>
                        <div class="col">dcfasyo_Dfdjl</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Created</p>
                        </div>
                        <div class="col">2019/01/12 23:13</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Email</p>
                        </div>
                        <div class="col"><a href="mailto:tony@gmail.com">tony@gmail.com</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Description</p>
                        </div>
                        <div class="col">
                            <p class="fst-italic text-400 mb-1">No Description</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-0">VAT number</p>
                        </div>
                        <div class="col">
                            <p class="fst-italic text-400 mb-0">No VAT number</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">Billing Information</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Send email to</p>
                        </div>
                        <div class="col"><a href="mailto:tony@gmail.com">tony@gmail.com</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Address</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">8962 Lafayette St. <br />Oswego, NY 13126</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Phone number</p>
                        </div>
                        <div class="col"><a href="tel:+12025550110">+1-202-555-0110</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-0">Invoice prefix</p>
                        </div>
                        <div class="col">
                            <p class="fw-semi-bold mb-0">7C23435</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer border-top text-end"><a class="btn btn-falcon-default btn-sm" href="#!"><span
                    class="fas fa-dollar-sign fs--2 me-1"></span>Refund</a><a class="btn btn-falcon-default btn-sm ms-2"
                href="#!"><span class="fas fa-check fs--2 me-1"></span>Save changes</a></div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Logs</h5>
        </div>
        <div class="card-body border-top p-0">
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-soft-success rounded-pill">200</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoiceitems</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/23 15:29:45</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-soft-warning rounded-pill">400</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoiceitems</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/19 21:32:12</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-soft-success rounded-pill">200</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/26 12:23:43</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-soft-success rounded-pill">200</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/12 23:32:12</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-soft-danger rounded-pill">404</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/08 02:20:23</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-soft-success rounded-pill">200</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/01 12:29:34</p>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light p-0"><a class="btn btn-link d-block w-100" href="#!">View more logs<span
                    class="fas fa-chevron-right fs--2 ms-1"></span></a></div>
    </div>
@endsection

@section('base.js')
    <div class="modal fade" id="modal-stok" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document" style="max-width: 80%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                        <h4 class="mb-1" id="staticBackdropLabel">Cari Product</h4>
                        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
                    </div>
                    <form class="row gy-2 gx-2 align-items-center p-4">
                        <div class="col-10">
                            <label class="visually-hidden" for="autoSizingInput">Nama Product</label>
                            <input class="form-control" id="autoSizingInput" type="text" placeholder="Nasi Goreng" />
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
