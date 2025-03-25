@extends('layouts.base')
@section('base.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <script src="{{ asset('vendors/lottie/lottie.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2"
                            src="../assets/img/illustrations/crm-bar-chart.png" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-0">Resto <span class="text-info fw-medium">Master
                                    Menu</span></h4>
                        </div><img class="ms-n4 d-md-none d-lg-block" src="../assets/img/illustrations/crm-line-chart.png"
                            alt="" width="150" />
                    </div>
                    <div class="col-md-auto p-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card overflow-hidden">
                <div class="card-header d-flex flex-between-center bg-light py-2">
                    <h6 class="mb-0">Master Menu</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-transaction-summary" data-bs-toggle="dropdown"
                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2"
                            aria-labelledby="dropdown-transaction-summary">
                            <a class="dropdown-item" href="#!" data-bs-toggle="modal" data-bs-target="#modal-menu"
                                id="button-menu-add">Add Menu</a>
                            <a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body py-0">
                    <div class="table-responsive scrollbar">
                        <table class="table table-dashboard mb-0 fs--1">
                            @foreach ($data as $datas)
                                <tr>
                                    <td class="align-middle ps-0 text-nowrap">
                                        <div class="d-flex position-relative align-items-center"><img
                                                class="d-flex align-self-center me-2" src="../assets/img/logos/hubstaff.png"
                                                alt="" width="30" />
                                            <div class="flex-1"><a class="stretched-link" href="#!">
                                                    <h6 class="mb-0">{{ $datas->menu_name }}</h6>
                                                </a>
                                                <p class="mb-0">{{ $datas->menu_code }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle px-4" style="width:1%;"><span
                                            class="badge fs--1 w-100 badge-soft-warning">{{ $datas->menu_link }}</span></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <div class="row flex-between-center">
                        {{-- <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Last 7 days</option>
                                <option>Last Month</option>
                                <option>Last Year</option>
                            </select>
                        </div>
                        <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">View All<span
                                    class="fas fa-chevron-right ms-1 fs--2"></span></a></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('base.js')
    <div class="modal fade" id="modal-menu" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-show"></div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>


    {{-- <script src="{{ asset('assets/img/animated-icons/loading.json') }}"></script> --}}

    <script>
        $('#organizerSingle').on("change", function() {
            var dataid = $("#organizerSingle option:selected").attr('data-id');
            if (dataid == null) {
                location.reload();
            } else {
                $.ajax({
                    url: "{{ route('master_akses_menu_detail') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": dataid,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    $("#menu-akses-detail").html(data);
                }).fail(function() {
                    console.log('eror');
                });
            }
        });
        $(document).on("click", "#button-menu-add", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $('#menu-show').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('master_menu_add') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-show').html(data);
            }).fail(function() {
                $('#menu-show').html('eror');
            });

        });
    </script>
@endsection
