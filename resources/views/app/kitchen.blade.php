@extends('layouts.base')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2"
                            src="../assets/img/illustrations/crm-bar-chart.png" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-0">Resto <span class="text-info fw-medium">Kitchen
                                    Request</span></h4>
                        </div><img class="ms-n4 d-md-none d-lg-block" src="../assets/img/illustrations/crm-line-chart.png"
                            alt="" width="150" />
                    </div>
                    <div class="col-md-auto p-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Data Order Kitchen</h5>
                </div>
                <div class="col-auto">

                </div>
            </div>
        </div>
        <div class="card-body border-top">
            <div class="row justify-content-center">
                @if ($data->isEmpty())
                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <div class="lottie mx-auto" style="width: 130px; height: 130px"
                            data-options='{"path":"../../assets/img/animated-icons/warning-light.json"}'></div>
                    </div>
                @else
                    @foreach ($data as $datas)
                        <div class="col-md-3 mb-3">
                            <div class="border rounded-3 overflow-hidden">
                                <div class="d-flex flex-between-center px-4 pt-2">
                                    <div>
                                        <h4 class="fw-light text-primary fs-3 mb-0">Order #{{$datas->id}}</h4>
                                        <h2 class="fw-light text-primary mt-0"><sup class="fs-1">{{$datas->no_reg_order}}</h2>
                                    </div>
                                    <div class="pe-3"><img src="{{ asset('assets/img/team/order.png') }}" width="70" alt="">
                                    </div>
                                </div>
                                <div class="px-4 pb-3 bg-light">
                                    @php
                                        $menu = DB::table('m_order_list_detail')
                                            ->join(
                                                't_product',
                                                't_product.t_product_code',
                                                '=',
                                                'm_order_list_detail.t_product_code',
                                            )
                                            ->where('m_order_list_detail.no_reg_order', $datas->no_reg_order)
                                            ->get();
                                    @endphp
                                    <ul class="list-unstyled">
                                        @foreach ($menu as $menus)
                                            <li class="border-bottom py-2">
                                                <!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                {{ $menus->t_product_name }}
                                                @if ($menus->order_status == 1)
                                                    <span class="fas fa-clipboard-check text-primary float-end"></span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    <button class="btn btn-primary d-block w-100" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modal-order-kitchen" id="button-cook-kitchen"
                                        data-code="{{ $datas->no_reg_order }}">Plan Now</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card-footer border-top py-2 col-12 text-center">
            <h5 class="">-</h5>
        </div>
    </div>
@endsection

@section('base.js')
    <div class="modal fade" id="modal-order-kitchen" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1" id="button-x">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close" onclick="location.reload();"></button>
                </div>
                <div id="menu-modal-kitchen"></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script>
        $(document).on("click", "#button-cook-kitchen", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-modal-kitchen').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('kitchen_req_detail') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-modal-kitchen').html(data);
            }).fail(function() {
                $('#menu-modal-kitchen').html('eror');
            });
        });
        $(document).on("click", "#button-finish-order-kitchen", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#button-finish-order-kitchen').html(
                '<div class="spinner-border spinner-border-sm" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('kitchen_req_finish') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                setInterval(() => {
                    location.reload();
                }, 2000);
            }).fail(function() {
                $('#button-finish-order-kitchen').html('eror');
            });
        });
    </script>
@endsection
