<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Prosess Order</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="p-3">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">Order {{ $data->no_reg_order }}</h5>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-falcon-primary btn-sm mb-2 mb-sm-0" type="button" id="button-payment-order"
                            data-code="{{ $data->no_reg_order }}"><span
                                class="fas fa-money-check-alt me-1"></span>Payment</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive scrollbar mt-0 fs--1">
                    <table class="table table-striped border-bottom">
                        <thead class="light">
                            <tr class="bg-primary text-white dark__bg-1000">
                                <th class="border-0">Order</th>
                                <th class="border-0 text-center">Qty</th>
                                <th class="border-0 text-end">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                                $item = DB::table('m_order_list_detail')
                                    ->join(
                                        't_product',
                                        't_product.t_product_code',
                                        '=',
                                        'm_order_list_detail.t_product_code',
                                    )
                                    ->where('m_order_list_detail.no_reg_order', $data->no_reg_order)
                                    ->get();
                            @endphp
                            @foreach ($item as $items)
                                <tr>
                                    <td>{{ $items->t_product_name }}</td>
                                    <td>{{ $items->order_qty }}</td>
                                    <td class="align-middle text-end">@currency($items->order_price)</td>
                                </tr>
                                @php
                                    $total = $items->order_price + $total;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-900">Subtotal:</th>
                                <td class="fw-semi-bold">@currency($total)</td>
                            </tr>
                            <tr>
                                <th class="text-900">PPH 11%:</th>
                                <td class="fw-semi-bold">@currency(0)</td>
                            </tr>
                            <tr class="border-top border-top-2 fw-bolder text-900">
                                <th>Total Payment:</th>
                                <td>@currency($total)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div id="loading-proses-payment"></div>
            <div class="card-footer bg-light">
                <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s
                    anything
                    else we can do, please let us know!</p>
            </div>
        </div>
    </div>
</div>
