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
                            <h4 class="text-primary fw-bold mb-0">Resto <span class="text-info fw-medium">CRM</span></h4>
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
                    <div class="d-none" id="orders-bulk-actions">
                        <div class="d-flex">
                            <select class="form-select form-select-sm" aria-label="Bulk actions">
                                <option selected="">Bulk actions</option>
                                <option value="Refund">Refund</option>
                                <option value="Delete">Delete</option>
                                <option value="Archive">Archive</option>
                            </select>
                            <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
                        </div>
                    </div>
                    <div id="orders-actions">
                        <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">New</span></button>
                        <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">Filter</span></button>
                        <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">Export</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th>
                                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                    <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox"
                                        data-bulk-select='{"body":"table-orders-body","actions":"orders-bulk-actions","replacedElement":"orders-actions"}' />
                                </div>
                            </th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">Order</th>
                            <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Date</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address">Request Order</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address">Table Order</th>
                            <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">Status</th>
                            <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Amount</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                        @foreach ($data as $item)
                            <tr class="btn-reveal-trigger">
                                <td class="align-middle" style="width: 28px;">
                                    <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="checkbox-0"
                                            data-bulk-select-row="data-bulk-select-row" />
                                    </div>
                                </td>
                                <td class="order py-2 align-middle white-space-nowrap"><a
                                        href="../../../app/e-commerce/orders/order-details.html"> <strong>#{{$item->id}}</strong></a>
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
                                            ->where('m_order_list_detail.no_reg_order',$item->no_reg_order)
                                            ->get();
                                    @endphp
                                    @foreach ($menu as $menus)
                                        <p class="mb-0 text-900">{{ $menus->t_product_name }}</p>
                                        @php
                                            $total = $menus->order_price + $total;
                                        @endphp
                                    @endforeach

                                </td>
                                <td>{{$item->m_order_table}}</td>
                                <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                    @if ($item->m_order_status == 0)
                                        <span class="badge badge rounded-pill d-block badge-soft-warning">Prosess<span
                                                class="ms-1 fas fa-cogs" data-fa-transform="shrink-2"></span></span>
                                    @else
                                        <span class="badge badge rounded-pill d-block badge-soft-success">Completed<span
                                                class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
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
                                            <div class="bg-white py-2"><a class="dropdown-item"
                                                    href="#!">Completed</a><a class="dropdown-item"
                                                    href="#!">Processing</a><a class="dropdown-item"
                                                    href="#!">On Hold</a><a class="dropdown-item"
                                                    href="#!">Pending</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                                    href="#!">Delete</a>
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
