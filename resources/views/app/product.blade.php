@extends('layouts.base')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0">Showing 1-24 of 205 Products</h6>
                </div>
                <div class="col-sm-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="col-auto">
                            <form class="row gx-2">
                                <div class="col-auto"><small>Sort by: </small></div>
                                <div class="col-auto">
                                    <select class="form-select form-select-sm" aria-label="Bulk actions">
                                        <option selected="">Best Match</option>
                                        <option value="Refund">Newest</option>
                                        <option value="Delete">Price</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-auto pe-0"><a class="text-600 px-1"
                                href="../../../app/e-commerce/product/product-grid.html" data-bs-toggle="tooltip"
                                title="" data-bs-original-title="Product Grid" aria-label="Product Grid"><svg
                                    class="svg-inline--fa fa-th fa-w-16" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="th" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z">
                                    </path>
                                </svg><!-- <span class="fas fa-th"></span> Font Awesome fontawesome.com --></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Data Product</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal"
                        data-bs-target="#modal-product" id="button-add-product">
                        <span class="far fa-plus-square fs--2 me-1"></span>Add Product</a>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-2">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Nama Product</th>
                        <th>Categories</th>
                        <th>Variants</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->t_product_name}}</td>
                            <td>{{$item->t_category_name}}</td>
                            <td>{{$item->t_product_type}}</td>
                            <td>@currency($item->t_product_price)</td>
                            <td>{{$item->t_product_disc}} %</td>
                            <td>
                                @if ($item->t_product_status == 1)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>{{$item->created_at}}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-product" id="button-display-product"
                                            data-code="{{ $item->t_product_code }}"><span class="fas fa-chalkboard-teacher"></span>
                                            Display</button>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-product" id="button-edit-product"
                                            data-code="{{ $item->t_product_code }}"><span class="far fa-edit"></span>
                                            Edit</button>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-product"
                                            id="button-detail-product" data-code="{{ $item->t_product_code }}"><span
                                                class="far fa-folder-open"></span> Detail Product</button>


                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-product" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document" style="max-width: 60%;">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-product"></div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>

    {{-- <script src="{{ asset('assets/img/animated-icons/loading.json') }}"></script> --}}
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
    <script>
        $(document).on("click", "#button-add-product", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-product').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_product_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-product').html(data);
            }).fail(function() {
                $('#menu-product').html('eror');
            });

        });
        $(document).on("click", "#button-display-product", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-product').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_product_display') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-product').html(data);
            }).fail(function() {
                $('#menu-product').html('eror');
            });

        });
        $(document).on("click", "#button-edit-product", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-product').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_product_edit') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-product').html(data);
            }).fail(function() {
                $('#menu-product').html('eror');
            });

        });
        $(document).on("click", "#button-detail-product", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-product').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('app_product_detail') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-product').html(data);
            }).fail(function() {
                $('#menu-product').html('eror');
            });

        });
    </script>
@endsection
