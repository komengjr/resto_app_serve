@extends('layouts.base')
@section('base.css')
    <link href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2"
                            src="{{ asset('assets/img/illustrations/crm-bar-chart.png') }}" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-0">Resto <span class="text-info fw-medium">List Order</span>
                            </h4>
                        </div><img class="ms-n4 d-md-none d-lg-block" src="../assets/img/illustrations/crm-line-chart.png"
                            alt="" width="150" />
                    </div>
                    <div class="col-md-auto p-3">
                        <form class="row align-items-center g-3">
                            <div class="col-auto">
                                <h6 class="text-700 mb-0">Showing Data For: </h6>
                            </div>
                            <div class="col-md-auto position-relative">
                                <input class="form-control form-control-sm datetimepicker ps-4" id="CRMDateRange"
                                    type="text"
                                    data-options="{&quot;mode&quot;:&quot;range&quot;,&quot;dateFormat&quot;:&quot;M d&quot;,&quot;disableMobile&quot;:true , &quot;defaultDate&quot;: [&quot;Sep 12&quot;, &quot;Sep 19&quot;] }" /><span
                                    class="fas fa-calendar-alt text-primary position-absolute top-50 translate-middle-y ms-2">
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3" id="ordersTable"
        data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Orders</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">

                    <div id="orders-actions">
                        <div class="input-group">
                            <input class="form-control" type="text"
                                aria-label="Dollar amount (with dot and two decimal places)" /><button
                                class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-search"
                                    data-fa-transform="shrink-3 down-2"></span><span
                                    class="d-none d-sm-inline-block ms-1">Find</span></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">No</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">Custemer Order</th>
                            <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Date</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address">Request Order</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address">Table Order</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address">user</th>
                            <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">Status</th>
                            <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Amount</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr class="btn-reveal-trigger">
                                <td class="order py-2 align-middle white-space-nowrap">

                                    {{ $no++ }}

                                </td>
                                <td class="order py-2 align-middle white-space-nowrap"><a href="#">
                                        <strong>#{{ $item->id }}</strong></a>
                                    by
                                    <strong>{{ $item->m_order_user }}</strong><br /><a
                                        href="mailto:ricky@example.com">{{ $item->no_reg_order }}</a>
                                </td>
                                <td class="date py-2 align-middle">{{ $item->m_order_date }}</td>
                                <td class="address py-2 align-middle white-space-nowrap">
                                    @php
                                        $total = 0;
                                        $menu = DB::table('m_order_list_detail')
                                            ->join(
                                                't_product',
                                                't_product.t_product_code',
                                                '=',
                                                'm_order_list_detail.t_product_code',
                                            )
                                            ->where('m_order_list_detail.no_reg_order', $item->no_reg_order)
                                            ->get();
                                    @endphp
                                    @foreach ($menu as $menus)
                                        <p class="mb-0 text-900">{{ $menus->t_product_name }}</p>
                                        @php
                                            $total = $menus->order_price + $total;
                                        @endphp
                                    @endforeach

                                </td>
                                <td>{{ $item->m_table_master_name }}</td>
                                <td class="address py-2 align-middle white-space-nowrap">
                                    @php
                                        $user = DB::table('user_mains')
                                            ->select('user_mains.fullname')
                                            ->where('userid', $item->userid)
                                            ->first();
                                    @endphp
                                    @if ($user)
                                        {{ $user->fullname }}
                                    @endif
                                </td>
                                <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                    @if ($item->m_order_status == 2)
                                        <span class="badge badge rounded-pill d-block badge-soft-success">Done</span>
                                    @elseif ($item->m_order_status == 1)
                                        <span class="badge badge rounded-pill d-block badge-soft-warning">Prosess
                                            Payment</span>
                                    @else
                                        <span class="badge badge rounded-pill d-block badge-soft-info">Prosess Cook</span>
                                    @endif
                                </td>
                                <td class="amount py-2 align-middle text-end fs-0 fw-medium">@currency($total)</td>
                                <td class="py-2 align-middle white-space-nowrap text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                            type="button" id="order-dropdown-0" data-bs-toggle="dropdown"
                                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-0">
                                            <div class="bg-white py-2">
                                                @if ($item->m_order_status == 1)
                                                    <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                                        data-bs-target="#modal-order-list" id="button-prosess-order"
                                                        data-code="{{ $item->no_reg_order }}"><span class="fas fa-money-check"></span> Prosess Payment</a>
                                                @endif
                                                <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                                    data-bs-target="#modal-order-list" id="button-print-invoice" data-code="{{ $item->no_reg_order }}"><span class="fas fa-file-invoice"></span> Print Order</a>
                                                <a class="dropdown-item" href="#!" data-bs-toggle="modal"
                                                data-bs-target="#modal-order-list" id="button-detail-order" data-code="{{ $item->no_reg_order }}"><span class="far fa-file-alt"></span> Detail Order</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                                    href="#!">Return</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                    data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>
@endsection

@section('base.js')
    <div class="modal fade" id="modal-order-list" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1" id="button-x">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-order-list-modal"></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    <script>
        $(document).on("click", "#button-prosess-order", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            // $('#button-create-hide').html("");
            $('#menu-order-list-modal').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('list_order_prosess') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-order-list-modal').html(data);
            }).fail(function() {
                $('#menu-order-list-modal').html('eror');
            });

        });
        $(document).on("click", "#button-payment-order", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#loading-proses-payment').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('list_order_prosess_payment') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#loading-proses-payment').html(data);
            }).fail(function() {
                $('#loading-proses-payment').html('eror');
            });

        });
        $(document).on("click", "#button-detail-order", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-order-list-modal').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('list_order_detail') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-order-list-modal').html(data);
            }).fail(function() {
                $('#menu-order-list-modal').html('eror');
            });

        });
        $(document).on("click", "#button-print-invoice", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            console.log(code);

            $('#menu-order-list-modal').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('list_order_print_invoice') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                // $('#menu-order-list-modal').html(data);
                $('#menu-order-list-modal').html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%; height:533px;" frameborder="0"></iframe>');
            }).fail(function() {
                $('#menu-order-list-modal').html('eror');
            });

        });
    </script>
    <script>
        $(document).on("click", "#button-payment-token", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            // $("#button-payment-test-load").html(
            //     '<button class="btn btn-outline-info d-block w-100" type="button"" disabled><i class="fas fa-credit-card"></i> Loading..</button>'
            // );
            $.ajax({
                url: "{{ route('create-payemnt-token') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                snap.pay(data, {
                    onSuccess: function(result) {
                        alert("payment success!");
                        location.reload();
                    },
                    onPending: function(result) {
                        alert("wating your payment!");
                        console.log(result);
                        window.location.href = "{{ route('list_order') }}";
                    },
                    onError: function(result) {
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        alert('you closed the popup without finishing the payment');
                        location.reload();
                    }
                });
            }).fail(function() {
                console.log('eror');
            });
        });
    </script>
@endsection
