@foreach ($data as $item)
<div class="mb-4 col-md-6 col-lg-4">
    <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
        <div class="overflow-hidden">
            <div class="position-relative rounded-top overflow-hidden">
                <a class="d-block" href="#"><img class="img-fluid rounded-top"
                        src="{{ asset($item->t_product_file) }}" alt="" /></a><span
                    class="badge rounded-pill bg-success position-absolute mt-2 me-2 z-index-2 top-0 end-0">New</span>
            </div>
            <div class="p-3">
                <h5 class="fs-0">
                    <a class="text-dark" href="#">{{ $item->t_product_name }}</a>
                </h5>
                <p class="fs--1 mb-3">
                    <a class="text-500" href="#!">Makanan</a>
                </p>
                <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center ">
                    @currency($item->t_product_price - ($item->t_product_disc * $item->t_product_price) / 100)
                    <del class="ms-2 fs--1 text-500">@currency($item->t_product_price) </del>
                </h5>

            </div>
        </div>
        <div class="d-flex flex-between-center px-3">
            <div>
                <span class="fa fa-star text-warning"></span><span
                    class="fa fa-star text-warning"></span><span
                    class="fa fa-star text-warning"></span><span
                    class="fa fa-star text-warning"></span><span
                    class="fa fa-star text-300"></span><span class="ms-1">(10)</span>
            </div>
            <div>
                <a class="btn btn-sm btn-falcon-default" href="#!"
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Add to Cart" id="button-add-product-list"
                    data-code="{{ $item->t_product_code }}"><span class="fas fa-cart-plus"></span> Add</a>
            </div>
        </div>
    </div>
</div>
@endforeach
