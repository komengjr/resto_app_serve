<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Confrim Order Customer</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="p-3">
        @if ($data->isEmpty())
            <span class="badge bg-warning">Lengkapi Terlebih Dahulu</span>
        @else
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md">
                            <h5 class="mb-2 mb-md-0">Order {{ $data[0]->no_order }}</h5>
                        </div>
                        <div class="col-auto">
                            <span id="button-change-order">
                                <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button" id="button-create-order-fix"> <span
                                        class="fas fa-file-contract me-1"> </span>Create Order</button>
                            </span>

                            <a class="btn btn-falcon-danger btn-sm mb-2 mb-sm-0" type="button" href="{{ route('menu_order') }}"><span
                                    class="fas fa-sign-out-alt me-1"></span>Exit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" id="form-user">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Customer Name</label>
                            <input type="text" class="form-control" name="user" id="user">
                        </div>
                        <div class="col-6">
                            <label for="">Customer No Handphone</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp">
                        </div>
                    </div>
                </div>
            </div>
            <div id="loading-fix-order"></div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row align-items-center text-center mb-3">
                        <div class="col-sm-6 text-sm-start"><img src="{{ asset('assets/img/logos/resto.png') }}"
                                alt="invoice" width="150" /></div>
                        <div class="col text-sm-end mt-3 mt-sm-0">
                            <h2 class="mb-3">Invoice</h2>
                            <h5>Resto Managemen System</h5>
                            <h6>{{ $table->m_table_master_name }} <input type="text" name="no_table" id="no_table"
                                    value="{{ $table->m_table_master_code }}" hidden></h6>
                            <p class="fs--1 mb-0">156 Pangeran Samsudin, Toronto<br />On, Kalimantan Barat, M5H 2H7</p>
                            <input type="text" name="fix-order" id="fix-order" value="{{ $order }}" hidden>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                    </div>
                    {{-- <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-500">Invoice to</h6>
                        <h5>Antonio Banderas</h5>
                        <p class="fs--1">1954 Bloor Street West<br />Torronto ON, M6P 3K9<br />Canada</p>
                        <p class="fs--1"><a href="mailto:example@gmail.com">example@gmail.com</a><br /><a
                                href="tel:444466667777">+4444-6666-7777</a></p>
                    </div>
                    <div class="col-sm-auto ms-auto">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless fs--1">
                                <tbody>
                                    <tr>
                                        <th class="text-sm-end">Invoice No:</th>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm-end">Order Number:</th>
                                        <td>AD20294</td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm-end">Invoice Date:</th>
                                        <td>2018-09-25</td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm-end">Payment Due:</th>
                                        <td>Upon receipt</td>
                                    </tr>
                                    <tr class="alert-success fw-bold">
                                        <th class="text-sm-end">Amount Due:</th>
                                        <td>$19688.40</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
                    <div class="table-responsive scrollbar mt-4 fs--1">
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
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="align-middle">
                                            <h6 class="mb-0 text-nowrap">{{ $item->t_product_name }}</h6>
                                            <p class="mb-0">{{ $item->t_product_type }}</p>
                                        </td>
                                        <td class="align-middle text-center">{{ $item->quantity }}</td>
                                        <td class="align-middle text-end">@currency(($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100) * $item->quantity)</td>
                                    </tr>
                                    @php
                                        $total =
                                            ($item->t_product_price -
                                                ($item->t_product_disc * $item->t_product_price) / 100) *
                                                $item->quantity +
                                            $total;
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
                <div class="card-footer bg-light">
                    <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s
                        anything
                        else we can do, please let us know!</p>
                </div>
            </div>
        @endif
    </div>
</div>
