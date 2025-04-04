@extends('layouts.base')
@section('base.css')
@endsection
@section('content')
    <div class="row g-3">
        <div class="col-xl-12">
            {{-- <div class="card bg-light my-3">
                <div class="card-body p-3">
                    <p class="fs--1 mb-0"><a href="#!"><span class="fas fa-exchange-alt me-2"
                                data-fa-transform="rotate-90"></span>A payout for <strong>$921.42 </strong>was deposited 13
                            days ago</a>. Your next deposit is expected on <strong>Tuesday, March 13.</strong></p>
                </div>
            </div> --}}
            <div class="row g-3 mb-3">
                <div class="col-xl-4">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card"
                            style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="card-body position-relative">
                            <h6>Total Verifikasi<span class="badge badge-soft-warning rounded-pill ms-2">-0.23%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                                data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>0</div><a
                                class="fw-semi-bold fs--1 text-nowrap" href="#">See all<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card"
                            style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="card-body position-relative">
                            <h6>Verifikasi Approve<span class="badge badge-soft-info rounded-pill ms-2">0.0%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                                data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div><a
                                class="fw-semi-bold fs--1 text-nowrap" href="#">Show<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card"
                            style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="card-body position-relative">
                            <h6>Verifikasi Dicline<span class="badge badge-soft-success rounded-pill ms-2">9.54%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
                                data-countup='{"endValue":43594,"prefix":"$"}'>0</div><a
                                class="fw-semi-bold fs--1 text-nowrap" href="#">Show<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card overflow-hidden">
                <div class="card-header d-flex flex-between-center bg-light py-2">
                    <h6 class="mb-0">Verifikasi Stok</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-transaction-summary" data-bs-toggle="dropdown"
                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2"
                            aria-labelledby="dropdown-transaction-summary"><a class="dropdown-item"
                                href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
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
                                                class="d-flex align-self-center me-2"
                                                src="{{ asset($datas->t_product_file) }}" alt="" width="30" />
                                            <div class="flex-1"><a class="stretched-link" href="#!">
                                                    <h6 class="mb-0">{{ $datas->t_product_name }}</h6>
                                                </a>
                                                <p class="mb-0">{{ $datas->t_product_type }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle px-4" style="width:1%;"><span
                                            class="badge fs--1 w-100 badge-soft-warning">Need Verif</span></td>
                                    <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                        <h6 class="mb-0">@currency($datas->t_product_price)</h6>
                                        <p class="fs--2 mb-0">{{ $datas->created_at }}</p>
                                    </td>
                                    <td class="align-middle ps-4 pe-1" style="width: 130px; min-width: 130px;">
                                        <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-verification" id="button-detail-verification"
                                            data-code="{{ $datas->t_product_token }}">Action</button>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Last 7 days</option>
                                <option>Last Month</option>
                                <option>Last Year</option>
                            </select>
                        </div>
                        <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">View All<span
                                    class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('base.js')
    <div class="modal fade" id="modal-verification" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl mt-6" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="menu-verification"></div>
            </div>
        </div>
    </div>


    <script>
        $(document).on("click", "#button-detail-verification", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-verification').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('verivication_detail') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-verification').html(data);
            }).fail(function() {
                $('#menu-verification').html('eror');
            });

        });
        $(document).on("click", "#button-verifikasi-stok-fix", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var verif = $(this).data("verif");
            $('#menu-verifikasi-fix').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('verivication_verif') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "verif": verif,
                },
                dataType: 'html',
            }).done(function(data) {
                location.reload();
            }).fail(function() {
                console.log(err);

            });

        });
    </script>
@endsection
