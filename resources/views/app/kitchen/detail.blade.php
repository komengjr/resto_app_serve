<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Detail Order Kitchen</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="p-3">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">Order {{ $data->no_reg_order }}</h5>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-falcon-primary btn-sm mb-2 mb-sm-0" type="button" id="button-finish-order-kitchen"
                            data-code="{{ $data->no_reg_order }}"><span class="far fa-calendar-check me-1"></span>Finish
                            Order</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive scrollbar mt-0 fs--1">
                    <table class="table table-striped border-bottom">
                        <thead class="light">
                            <tr class="bg-primary text-white dark__bg-1000">
                                <th class="border-0">Order</th>
                                <th class="border-0 text-center">Qty</th>
                                <th class="border-0 text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $item = DB::table('m_order_list_detail')
                                    ->join(
                                        't_product',
                                        't_product.t_product_code',
                                        '=',
                                        'm_order_list_detail.t_product_code',
                                    )
                                    ->where('m_order_list_detail.no_reg_order', $data->no_reg_order)
                                    ->get();
                            @endphp
                            @foreach ($item as $items)
                                <tr>
                                    <td>{{ $items->t_product_name }}</td>
                                    <td>{{ $items->order_qty }}</td>
                                    <td class="align-middle text-end" id="td_check_kitchen{{ $items->id }}">
                                        @if ($items->order_status == 1)
                                            <button class="btn btn-falcon-success" disabled><span
                                                    class="far fa-calendar-check"></span></button>
                                        @else
                                            <button class="btn btn-falcon-warning" id="button-check-kitchen{{ $items->id }}"
                                                data-code="{{ $items->id }}"><span
                                                    class="far fa-calendar"></span></button>
                                        @endif
                                    </td>
                                </tr>
                                <script>
                                    $(document).on("click", "#button-check-kitchen{{ $items->id }}", function(e) {
                                        e.preventDefault();
                                        var code = $(this).data("code");
                                        $.ajax({
                                            url: "{{ route('kitchen_req_check') }}",
                                            type: "POST",
                                            cache: false,
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "code": code
                                            },
                                            dataType: 'html',
                                        }).done(function(data) {
                                            $('#td_check_kitchen{{ $items->id }}').html(
                                                '<button class="btn btn-falcon-success" disabled ><span class="far fa-calendar-check"></span></button>'
                                                );
                                        }).fail(function() {
                                            $('#td_check_kitchen{{ $items->id }}').html('eror');
                                        });
                                    });
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="card-footer bg-light">
                <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s
                    anything
                    else we can do, please let us know!</p>
            </div>
        </div>
    </div>
</div>
