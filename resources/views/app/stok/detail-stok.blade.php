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
    <div class="card-footer border-top text-end">
        <a class="btn btn-falcon-default btn-sm ms-2" href="#!"><span class="fas fa-check fs--2 me-1"></span>Input
            Stok</a>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Logs</h5>
    </div>
    <div class="card-body border-top p-0">
        @php
            $log = DB::table('m_order_list_detail')
                ->join('m_order_list', 'm_order_list.no_reg_order', '=', 'm_order_list_detail.no_reg_order')
                ->join('t_product', 't_product.t_product_code', '=', 'm_order_list_detail.t_product_code')
                ->where('m_order_list_detail.t_product_code', $data->t_product_code)
                ->get();
        @endphp
        @foreach ($log as $logs)
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3">
                    @if ($logs->order_status == 1)
                        <span class="badge badge-soft-success rounded-pill">done</span>
                    @else
                        <span class="badge badge-soft-warning rounded-pill">proses</span>
                    @endif
                </div>
                <div class="col-md mt-1 mt-md-0">
                    <code>{{ $logs->t_product_name }}</code>
                </div>
                <div class="col-md mt-1 mt-md-0">
                    <code>{{ $logs->no_reg_order }}</code>
                </div>
                <div class="col-md mt-1 mt-md-0">
                    <code>{{ $logs->order_qty }}</code>
                </div>
                <div class="col-md mt-1 mt-md-0">
                    <code>@currency($logs->order_price)</code>
                </div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/23 15:29:45</p>
                </div>
            </div>
        @endforeach

    </div>
    <div class="card-footer bg-light p-0">
        {{-- <a class="btn btn-link d-block w-100" href="#!">View more logs<span
                class="fas fa-chevron-right fs--2 ms-1"></span></a> --}}
    </div>
</div>
