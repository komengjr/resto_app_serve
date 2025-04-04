<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Product Stok</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>

    <div class="p-3">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Details</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light border-top">
                <div class="row">
                    <div class="col-lg col-xxl-5">
                        <h6 class="fw-semi-bold ls mb-3 text-uppercase">Category Information</h6>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Category Code</p>
                            </div>
                            <div class="col">{{ $data->t_category_code }}</div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Category Name</p>
                            </div>
                            <div class="col">{{ $data->t_category_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Description</p>
                            </div>
                            <div class="col">
                                <p class="fst-italic text-400 mb-1">{{ $data->t_category_desc }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                        <h6 class="fw-semi-bold ls mb-3 text-uppercase">Product Information</h6>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Product Code</p>
                            </div>
                            <div class="col"><a href="mailto:tony@gmail.com">{{ $data->t_product_code }}</a></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Product Name</p>
                            </div>
                            <div class="col">
                                <p class="mb-1">{{ $data->t_product_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Product Type</p>
                            </div>
                            <div class="col"><a href="tel:+12025550110">{{ $data->t_product_type }}</a></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-0">Price</p>
                            </div>
                            <div class="col">
                                <p class="fw-semi-bold mb-0">@currency($data->t_product_price)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top text-end" id="menu-verifikasi-fix">
                <a class="btn btn-outline-success btn-sm ms-2" href="#!" id="button-verifikasi-stok-fix" data-code="{{ $data->t_product_token }}" data-verif="Y">
                    <span class="fas fa-check fs--2 me-1"></span>Verifikasi</a>
                <a class="btn btn-outline-danger btn-sm ms-2" href="#!" id="button-verifikasi-stok-fix" data-code="{{ $data->t_product_token }}" data-verif="T">
                    <span class="fas fa-check fs--2 me-1"></span>Decline</a>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Logs</h5>
            </div>
            <div class="card-body border-top p-0">
                <div class="row g-0 align-items-center border-bottom py-2 px-4">
                    <div class="col-md-auto pe-3">
                        status
                    </div>
                    <div class="col-md mt-1 mt-md-0">
                        <code>Product Name</code>
                    </div>
                    <div class="col-md mt-1 mt-md-0">
                        <code>Created By</code>
                    </div>
                    <div class="col-md mt-1 mt-md-0">
                        <code>Quantity</code>
                    </div>
                    <div class="col-md mt-1 mt-md-0 text-right">
                        <code>Used</code>
                    </div>
                    <div class="col-md mt-1 mt-md-0">
                        <code>Sisa</code>
                    </div>
                    <div class="col-md-auto">
                        <p class="mb-0">Created Date</p>
                    </div>
                </div>
            </div>
            <div class="card-body border-top p-0" id="menu-log-stok">
                @php
                    $log = DB::table('t_product_stok')
                        ->select('t_product_stok.*', 't_product.t_product_name', 't_product.t_product_price','user_mains.fullname')
                        ->join('t_product', 't_product.t_product_code', '=', 't_product_stok.t_product_code')
                        ->join('user_mains','user_mains.userid','=','t_product_stok.userid')
                        ->where('t_product_stok.t_product_code', $data->t_product_code)
                        ->orderBy('t_product_stok.id', 'DESC')
                        ->get();
                @endphp
                @foreach ($log as $logs)
                    <div class="row g-0 align-items-center border-bottom py-2 px-3">
                        <div class="col-md-auto pe-3">
                            @if ($logs->stok_status == 1)
                                <span class="badge badge-soft-success rounded-pill">Aktif</span>
                            @else
                                <span class="badge badge-soft-warning rounded-pill">Not Aktif</span>
                            @endif
                        </div>
                        <div class="col-md mt-1 mt-md-0">
                            <code>{{ $logs->t_product_name }}</code>
                        </div>
                        <div class="col-md mt-1 mt-md-0">
                            <code>{{ $logs->fullname }}</code>
                        </div>
                        <div class="col-md mt-1 mt-md-0">
                            <code>{{ $logs->t_stok_qty }}</code>
                        </div>
                        <div class="col-md mt-1 mt-md-0 text-center">
                            <code>{{ $logs->t_stok_used }}</code>
                        </div>
                        <div class="col-md mt-1 mt-md-0 text-center text-success">
                            {{ $logs->t_stok_qty - $logs->t_stok_used }}
                        </div>
                        <div class="col-md-auto">
                            <p class="mb-0">{{ $logs->created_at }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="card-footer bg-light p-0">
                {{-- <a class="btn btn-link d-block w-100" href="#!">View more logs<span
                        class="fas fa-chevron-right fs--2 ms-1"></span></a> --}}
            </div>
        </div>

    </div>
</div>
