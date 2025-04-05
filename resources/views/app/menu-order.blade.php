@extends('layouts.base')
@section('content')
    <div class="row g-3">
        <div class="col-xl-8">
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto">
                            <h5 class="mb-2 mb-sm-0">Menu Order :</h5>
                        </div>
                        <div class="col-sm-auto" id="button-create-hide"><a class="btn btn-falcon-default btn-sm"
                                href="#!" id="button-create-new-order"><span class="fas fa-folder-plus me-2"
                                    data-fa-transform="shrink-2"></span>New Order</a></div>
                    </div>
                </div>
                <div class="card m-3">
                    <div class="card-body border border-info border-1100">
                        <div class="row flex-between-center">
                            <div class="col-sm-auto mb-2 mb-sm-0">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Cari Nama Product"
                                        aria-label="Dollar amount (with dot and two decimal places)" /><span
                                        class="input-group-text"><span class="fas fa-search"
                                            style="cursor: pointer;"></span></span>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="row gx-2 align-items-center">
                                    <div class="col-auto">
                                        <form class="row gx-2">
                                            <div class="col-auto"><small>Category by:</small></div>
                                            <div class="col-auto">
                                                <select class="form-select form-select-sm" aria-label="Bulk actions"
                                                    id="organizerSingle" size="1" name="organizerSingle">
                                                    <option data-id="all">Choose Category</option>
                                                    @foreach ($cat as $cats)
                                                        <option data-id="{{ $cats->t_category_code }}">
                                                            {{ $cats->t_category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-auto pe-0">
                                        <a class="text-600 px-1" href="#" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Product List"><span
                                                class="fas fa-list-ul"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="mx-3">
                        <div class="row" id="menu-list-product">
                            @foreach ($data as $item)
                                <div class="mb-4 col-md-6 col-lg-4">
                                    <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                                        <div class="overflow-hidden">
                                            <div class="position-relative rounded-top overflow-hidden">
                                                <a class="d-block" href="#"><img class="img-fluid rounded-top"
                                                        src="{{ asset($item->t_product_file) }}" alt="" /></a><span
                                                    class="badge rounded-pill bg-success position-absolute mt-2 me-2 z-index-2 top-0 end-0">New</span>
                                            </div>
                                            <div class="p-3">
                                                <h5 class="fs-0">
                                                    <a class="text-dark" href="#">{{ $item->t_product_name }}</a>
                                                </h5>
                                                <p class="fs--1 mb-3">
                                                    <a class="text-500" href="#!">Makanan</a>
                                                </p>
                                                <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center ">
                                                    @currency($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100)
                                                    <del class="ms-2 fs--1 text-500">@currency($item->t_product_price) </del>
                                                </h5>

                                            </div>
                                        </div>
                                        <div class="d-flex flex-between-center px-3">
                                            <div>
                                                @php
                                                    $stok = DB::table('t_product_stok')
                                                        ->where('t_product_code', $item->t_product_code)
                                                        ->where('stok_status',1)
                                                        ->sum('t_stok_qty');
                                                    $use = DB::table('t_product_stok')
                                                        ->where('t_product_code', $item->t_product_code)
                                                        ->where('stok_status',1)
                                                        ->sum('t_stok_used');
                                                @endphp
                                                Stok<span class="ms-1">( {{ $stok - $use }} )</span>
                                            </div>
                                            <div>
                                                @if (($stok - $use) > 0)
                                                    <a class="btn btn-sm btn-falcon-default" href="#!"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"
                                                        id="button-add-product-list"
                                                        data-code="{{ $item->t_product_code }}"><span
                                                            class="fas fa-cart-plus"></span> Add</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-center">
                        <div>
                            <button class="btn btn-falcon-default btn-sm me-2" type="button" disabled="disabled"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Prev">
                                <span class="fas fa-chevron-left"></span></button>
                            {{-- <a class="btn btn-sm btn-falcon-default text-primary me-2" href="#!">1</a>
                            <a class="btn btn-sm btn-falcon-default me-2" href="#!">2</a>
                            <a class="btn btn-sm btn-falcon-default me-2" href="#!">
                                <span class="fas fa-ellipsis-h"></span></a>
                            <a class="btn btn-sm btn-falcon-default me-2" href="#!">35</a> --}}
                            <button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Next">
                                <span class="fas fa-chevron-right"> </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-4 order-xl-1" id="detail-order">
            <div class="card mb-3" id="detail">
                <div class="card-header bg-light btn-reveal-trigger d-flex flex-between-center">
                    <h5 class="mb-0">No Order : </h5>
                    <input type="text" name="no_order" value="" id="no_order" hidden>
                </div>
                <div class="card-body">
                </div>
                <div class="card-footer d-flex justify-content-between bg-light">

                </div>
            </div>
            <div class="card">

            </div>
        </div>
    </div>
@endsection

@section('base.js')
    <div class="modal fade" id="modal-order" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1" id="button-x">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-order-modal"></div>
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", "#button-create-new-order", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#button-create-hide').html("");
            $('#detail-order').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_order_create') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#detail-order').html(data);
            }).fail(function() {
                $('#detail-order').html('eror');
            });

        });
        $(document).on("click", "#button-chosse-table", function(e) {
            e.preventDefault();
            $('#menu-order-modal').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_order_create_table') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-order-modal').html(data);
            }).fail(function() {
                $('#menu-order-modal').html('eror');
            });

        });
        $(document).on("click", "#button-fix-table", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            console.log(code);

            $.ajax({
                url: "{{ route('menu_order_create_table_fix') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#table-no').html(data);
            }).fail(function() {
                $('#table-no').html('eror');
            });

        });
        $('#organizerSingle').on("change", function() {
            var dataid = $("#organizerSingle option:selected").attr('data-id');
            console.log(dataid);

            if (dataid == null) {
                location.reload();
            } else {
                $.ajax({
                    url: "{{ route('menu_search_category') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": dataid,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $("#menu-list-product").html(data);
                }).fail(function() {
                    console.log('eror');
                });
            }

        });
        $(document).on("click", "#button-add-product-list", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var order = document.getElementById("no_order").value;
            if (order == "") {
                $('#liveToastBtn').click();
            } else {
                $('#menu-table-order').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('menu_add_cart_product') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "code": code,
                        "order": order
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $('#menu-table-order').html(data);
                }).fail(function() {
                    $('#menu-table-order').html('eror');
                });
            }

        });
        $(document).on("click", "#button-confrim-order", function(e) {
            e.preventDefault();
            var order = document.getElementById("no_order").value;
            var table = document.getElementById("table").value;
            if (table == "") {
                $('#liveToastBtn').click();
            } else {
                $('#menu-order-modal').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('menu_confrim_order_customer') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "order": order,
                        "table": table
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $('#menu-order-modal').html(data);
                }).fail(function() {
                    $('#menu-order-modal').html('eror');
                });
            }
        });
        $(document).on("click", "#button-create-order-fix", function(e) {
            e.preventDefault();
            var fix_order = document.getElementById("fix-order").value;
            var no_table = document.getElementById("no_table").value;
            var user = document.getElementById("user").value;
            var no_hp = document.getElementById("no_hp").value;
            if (no_table == "" || user == "" || no_hp == "") {
                $('#liveToastBtn').click();
            } else {
                $('#loading-fix-order').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('menu_order_create_fix') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "fix_order": fix_order,
                        "no_table": no_table,
                        "user": user,
                        "no_hp": no_hp
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $('#button-change-order').html(
                        '<button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button" id="button-print-order-fix"><span class="fas fa-print me-1"> </span>Print</button>'
                        );
                    $('#loading-fix-order').html(data);
                    $('#button-x').html("");
                    $('#form-user').html("");
                }).fail(function() {
                    $('#loading-fix-order').html('eror');
                });
            }
        });
        $(document).on("click", "#button-print-order-fix", function(e) {
            e.preventDefault();
            var fix_order = document.getElementById("fix-order").value;
            // var no_table = document.getElementById("no_table").value;
            if (table == "") {
                $('#liveToastBtn').click();
            } else {
                $('#loading-fix-order').html(
                    '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    url: "{{ route('menu_print_order_fix') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "fix_order": fix_order,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $('#loading-fix-order').html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%; height:533px;" frameborder="0"></iframe>');
                }).fail(function() {
                    $('#loading-fix-order').html('eror');
                });
            }
        });
    </script>
@endsection
