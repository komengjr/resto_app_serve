@extends('layouts.base')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5 class="mb-2">Stok Management</h5>

                </div>
                <div class="col-auto d-none d-sm-block">
                    <button class="btn btn-falcon-default btn-sm" data-bs-toggle="modal" data-bs-target="#modal-stok"
                        id="button-search-data">
                        <span class="fas fa-search fs--2 me-1"></span> Cari Data</button>
                </div>
            </div>
        </div>
        <div class="card-body border-top">
            <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
                <div class="flex-1">
                    <p class="mb-0">Login : {{Auth::user()->fullname}}</p>
                    <p class="fs--1 mb-0 text-600">Jan 12, 11:13 PM</p>
                </div>
            </div>
        </div>
    </div>
    <span id="menu-stok-product">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Details</h5>
                    </div>

                </div>
            </div>
            <div class="card-body bg-light border-top">
                <div class="col-lg-12">
                    <div class="lottie mx-auto" style="width: 120px; height: 120px"
                        data-options='{"path":"../../assets/img/animated-icons/infinite-loop.json"}'></div>
                </div>
            </div>
            <div class="card-footer border-top text-end">

            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Logs</h5>
            </div>
            <div class="card-body border-top p-0">
                <div class="col-lg-12">
                    <div class="lottie mx-auto" style="width: 120px; height: 120px"
                        data-options='{"path":"../../assets/img/animated-icons/warning-light.json"}'></div>
                </div>
            </div>

        </div>
    </span>
@endsection

@section('base.js')
    <div class="modal fade" id="modal-stok" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-stok"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script>
        $(document).on("click", "#button-search-data", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-stok').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_stok_find') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stok').html(data);
            }).fail(function() {
                $('#menu-stok').html('eror');
            });

        });
        $(document).on("click", "#button-find-product", function(e) {
            e.preventDefault();
            var find = document.getElementById("find-input").value;
            $('#hasil-pencarian').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_stok_find_search') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": find
                },
                dataType: 'html',
            }).done(function(data) {
                $('#hasil-pencarian').html(data);
            }).fail(function() {
                $('#hasil-pencarian').html('eror');
            });

        });
        $(document).on("click", "#button-detail-product", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-stok-product').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_stok_find_detail') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-stok-product').html(data);
            }).fail(function() {
                $('#menu-stok-product').html('eror');
            });

        });
    </script>
@endsection
