<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Plan Table Order</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="p-3">
        <div class="card-body bg-light">
            <div class="row list" id="icon-list">
                @foreach ($table as $item)
                    @php
                        $cek = DB::table('m_order_list')
                            ->where('m_order_table', $item->m_table_master_code)
                            ->where('m_order_status','<', 2)
                            ->first();
                    @endphp
                    @if (!$cek)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="border border-300 rounded-2 p-3 mb-4 text-center bg-white dark__bg-1000 shadow-sm"
                                style="cursor: pointer;" id="button-fix-table"
                                data-code="{{ $item->m_table_master_code }}" data-bs-dismiss="modal">
                                <img src="{{ asset('assets/img/logos/table.png') }}" alt="" width="50">
                                <input
                                    class="form-control form-control-sm mt-3 text-center w-100 text-dark bg-200 dark__bg-1100 border-300"
                                    type="text" readonly="readonly" value="{{ $item->m_table_master_name }}">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
