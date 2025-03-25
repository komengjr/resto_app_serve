@extends('layouts.base')
@section('base.css')
@endsection
@section('content')
    <div class="row g-3">

        <div class="col">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row flex-between-center g-0">
                                <div class="col-6 d-lg-block flex-between-center">
                                    <h6 class="mb-2 text-900">Total Inventeris</h6>
                                    <h4 class="fs-3 fw-normal text-700 mb-0">0</h4>
                                </div>
                                <div class="col-auto h-100">
                                    <div style="height:50px;min-width:80px;"
                                        data-echarts='{"xAxis":{"show":false,"boundaryGap":false},"series":[{"data":[3,7,6,8,5,12,11],"type":"line","symbol":"none"}],"grid":{"right":"0px","left":"0px","bottom":"0px","top":"0px"}}'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row flex-between-center">
                                <div class="col d-md-flex d-lg-block flex-between-center">
                                    <h6 class="mb-md-0 mb-lg-2">Tot</h6><span
                                        class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span>
                                        61.8%</span>
                                </div>
                                <div class="col-auto">
                                    <h4 class="fs-3 fw-normal text-700"
                                        data-countup='{"endValue":82.18,"decimalPlaces":2,"suffix":"M","prefix":"$"}'>0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row flex-between-center">
                                <div class="col d-md-flex d-lg-block flex-between-center">
                                    <h6 class="mb-md-0 mb-lg-2">Conversion</h6><span
                                        class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span>
                                        29.4%</span>
                                </div>
                                <div class="col-auto">
                                    <h4 class="fs-3 fw-normal text-primary"
                                        data-countup='{"endValue":28.5,"decimalPlaces":2,"suffix":"%"}'>0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-xl-12">
            <div class="card bg-light my-3">
                <div class="card-body p-3">
                    <p class="fs--1 mb-0"><a href="#!"><span class="fas fa-exchange-alt me-2"
                                data-fa-transform="rotate-90"></span>A payout for <strong>$921.42 </strong>was deposited 13
                            days ago</a>. Your next deposit is expected on <strong>Tuesday, March 13.</strong></p>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-xl-4">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card"
                            style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="card-body position-relative">
                            <h6>Klasifikasi<span class="badge badge-soft-warning rounded-pill ms-2">-0.23%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                                data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>0</div><a
                                class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">See all<span
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
                            <h6>Orders<span class="badge badge-soft-info rounded-pill ms-2">0.0%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                                data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div><a
                                class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/orders/order-list.html">All
                                orders<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
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
                            <h6>Revenue<span class="badge badge-soft-success rounded-pill ms-2">9.54%</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
                                data-countup='{"endValue":43594,"prefix":"$"}'>0</div><a
                                class="fw-semi-bold fs--1 text-nowrap" href="../index.html">Statistics<span
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
                    <h6 class="mb-0">Master Data</h6>
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
                            <tr>
                                <td class="align-middle ps-0 text-nowrap">
                                    <div class="d-flex position-relative align-items-center"><img
                                            class="d-flex align-self-center me-2" src="../assets/img/logos/atlassian.png"
                                            alt="" width="30" />
                                        <div class="flex-1"><a class="stretched-link" href="#!">
                                                <h6 class="mb-0">Atlassian</h6>
                                            </a>
                                            <p class="mb-0">Subscription payment</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle px-4" style="width:1%;"><span
                                        class="badge fs--1 w-100 badge-soft-success">Completed</span></td>
                                <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                    <h6 class="mb-0">$290.00 USD</h6>
                                    <p class="fs--2 mb-0">15 May, 2020</p>
                                </td>
                                <td class="align-middle ps-4 pe-1" style="width: 130px; min-width: 130px;">
                                    <select class="form-select form-select-sm px-2 bg-transparent">
                                        <option>Action</option>
                                        <option>Archive</option>
                                        <option>Delete</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle ps-0 text-nowrap">
                                    <div class="d-flex position-relative align-items-center"><img
                                            class="d-flex align-self-center me-2" src="../assets/img/logos/hubstaff.png"
                                            alt="" width="30" />
                                        <div class="flex-1"><a class="stretched-link" href="#!">
                                                <h6 class="mb-0">Hubstaff</h6>
                                            </a>
                                            <p class="mb-0">Subscription payment</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle px-4" style="width:1%;"><span
                                        class="badge fs--1 w-100 badge-soft-warning">Pending</span></td>
                                <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                    <h6 class="mb-0">$200.00 USD</h6>
                                    <p class="fs--2 mb-0">1 May, 2020</p>
                                </td>
                                <td class="align-middle ps-4 pe-1" style="width: 130px; min-width: 130px;">
                                    <select class="form-select form-select-sm px-2 bg-transparent">
                                        <option>Action</option>
                                        <option>Archive</option>
                                        <option>Delete</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle ps-0 text-nowrap">
                                    <div class="d-flex position-relative align-items-center"><img
                                            class="d-flex align-self-center me-2" src="../assets/img/logos/bs-5.png"
                                            alt="" width="30" />
                                        <div class="flex-1"><a class="stretched-link" href="#!">
                                                <h6 class="mb-0">Bootstrap</h6>
                                            </a>
                                            <p class="mb-0">Subscription payment</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle px-4" style="width:1%;"><span
                                        class="badge fs--1 w-100 badge-soft-warning">Pending</span></td>
                                <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                    <h6 class="mb-0">$300.00 USD</h6>
                                    <p class="fs--2 mb-0">26 April, 2020</p>
                                </td>
                                <td class="align-middle ps-4 pe-1" style="width: 130px; min-width: 130px;">
                                    <select class="form-select form-select-sm px-2 bg-transparent">
                                        <option>Action</option>
                                        <option>Archive</option>
                                        <option>Delete</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle ps-0 text-nowrap">
                                    <div class="d-flex position-relative align-items-center"><img
                                            class="d-flex align-self-center me-2" src="../assets/img/logos/asana-logo.png"
                                            alt="" width="30" />
                                        <div class="flex-1"><a class="stretched-link" href="#!">
                                                <h6 class="mb-0">Asana</h6>
                                            </a>
                                            <p class="mb-0">Subscription payment</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle px-4" style="width:1%;"><span
                                        class="badge fs--1 w-100 badge-soft-warning">Pending</span></td>
                                <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                    <h6 class="mb-0">$320.00 USD</h6>
                                    <p class="fs--2 mb-0">14 April, 2020</p>
                                </td>
                                <td class="align-middle ps-4 pe-1" style="width: 130px; min-width: 130px;">
                                    <select class="form-select form-select-sm px-2 bg-transparent">
                                        <option>Action</option>
                                        <option>Archive</option>
                                        <option>Delete</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle ps-0 text-nowrap">
                                    <div class="d-flex position-relative align-items-center"><img
                                            class="d-flex align-self-center me-2"
                                            src="../assets/img/logos/adobe-creative-cloud.png" alt=""
                                            width="30" />
                                        <div class="flex-1"><a class="stretched-link" href="#!">
                                                <h6 class="mb-0">Adobe Creative Cloud</h6>
                                            </a>
                                            <p class="mb-0">Subscription payment</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle px-4" style="width:1%;"><span
                                        class="badge fs--1 w-100 badge-soft-warning">Pending</span></td>
                                <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                    <h6 class="mb-0">$150.00 USD</h6>
                                    <p class="fs--2 mb-0">11 April, 2020</p>
                                </td>
                                <td class="align-middle ps-4 pe-1" style="width: 130px; min-width: 130px;">
                                    <select class="form-select form-select-sm px-2 bg-transparent">
                                        <option>Action</option>
                                        <option>Archive</option>
                                        <option>Delete</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle ps-0 text-nowrap">
                                    <div class="d-flex position-relative align-items-center"><img
                                            class="d-flex align-self-center me-2" src="../assets/img/logos/coursera.png"
                                            alt="" width="30" />
                                        <div class="flex-1"><a class="stretched-link" href="#!">
                                                <h6 class="mb-0">Coursera</h6>
                                            </a>
                                            <p class="mb-0">Subscription payment</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle px-4" style="width:1%;"><span
                                        class="badge fs--1 w-100 badge-soft-warning">Pending</span></td>
                                <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                    <h6 class="mb-0">$280.00 USD</h6>
                                    <p class="fs--2 mb-0">26 March, 2020</p>
                                </td>
                                <td class="align-middle ps-4 pe-1" style="width: 130px; min-width: 130px;">
                                    <select class="form-select form-select-sm px-2 bg-transparent">
                                        <option>Action</option>
                                        <option>Archive</option>
                                        <option>Delete</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="border-0">
                                <td class="align-middle ps-0 text-nowrap border-0">
                                    <div class="d-flex position-relative align-items-center"><img
                                            class="d-flex align-self-center me-2" src="../assets/img/logos/medium.png"
                                            alt="" width="30" />
                                        <div class="flex-1"><a class="stretched-link" href="#!">
                                                <h6 class="mb-0">Medium</h6>
                                            </a>
                                            <p class="mb-0">Subscription payment</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle px-4 border-0" style="width:1%;"><span
                                        class="badge fs--1 w-100 badge-soft-danger">Rejected</span></td>
                                <td class="align-middle px-4 text-end text-nowrap border-0" style="width:1%;">
                                    <h6 class="mb-0">$290.00 USD</h6>
                                    <p class="fs--2 mb-0">15 March, 2020</p>
                                </td>
                                <td class="align-middle ps-4 pe-1 border-0" style="width: 130px; min-width: 130px;">
                                    <select class="form-select form-select-sm px-2 bg-transparent">
                                        <option>Action</option>
                                        <option>Archive</option>
                                        <option>Delete</option>
                                    </select>
                                </td>
                            </tr>
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
