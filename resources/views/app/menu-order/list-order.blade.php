<div class="card-body">
    <table class="table table-borderless fs--1 mb-0">
        <thead>
            <tr class="border-bottom">
                <th class="float-start">Name</th>
                <th class="text-center">Quantity</th>
                <th class="float-end">Price</th>
            </tr>
        </thead>
        @php
            $total = 0;
        @endphp
        @foreach ($data as $item)
            <tr class="border-bottom">
                <td class="ps-0">{{ $item->t_product_name }}
                    <div class="text-400 fw-normal fs--2">{{ $item->t_product_code }}</div>
                </td>
                <td>
                    <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                        <input class="form-control text-center px-2 input-spin-none" type="number" min="1"
                            value="{{ $item->quantity }}" style="width: 20px" />
                    </div>
                </td>
                <td class="pe-0 text-end">@currency(($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100 ) * $item->quantity)</td>
            </tr>
            @php
                $total =  ($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100 ) * $item->quantity  + $total;
            @endphp
        @endforeach
    </table>
</div>
<div class="card-footer d-flex justify-content-between bg-light">
    <div class="fw-semi-bold">Payable Total</div>
    <div class="fw-bold">@currency($total)</div>
</div>
{{-- <script src="{{ asset('assets/js/theme.js') }}"></script> --}}
