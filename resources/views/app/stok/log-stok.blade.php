@foreach ($data as $datas)
    <div class="row g-0 align-items-center border-bottom py-2 px-3">
        <div class="col-md-auto pe-3">
            @if ($datas->stok_status == 1)
                <span class="badge badge-soft-success rounded-pill">done</span>
            @else
                <span class="badge badge-soft-warning rounded-pill">proses</span>
            @endif
        </div>
        <div class="col-md mt-1 mt-md-0">
            <code>{{ $datas->t_product_name }}</code>
        </div>
        <div class="col-md mt-1 mt-md-0">
            <code>{{ $datas->userid }}</code>
        </div>
        <div class="col-md mt-1 mt-md-0">
            <code>{{ $datas->t_stok_qty }}</code>
        </div>
        <div class="col-md mt-1 mt-md-0">
            <code>{{ $datas->t_stok_used }}</code>
        </div>
        <div class="col-md mt-1 mt-md-0">
            <code>{{ $datas->t_stok_qty - $datas->t_stok_used }}</code>
        </div>
        <div class="col-md-auto">
            <p class="mb-0">2019/02/23 15:29:45</p>
        </div>
    </div>
@endforeach
