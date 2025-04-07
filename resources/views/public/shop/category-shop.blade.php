@if ($data->isEmpty())
    <div class="col-12 text-center">
        <div class="contact__widget">
            <span class="fa fa-exclamation-circle"></span>
            <h4>Menu Not Found</h4>
        </div>
    </div>
@else
    @foreach ($data as $datas)
        <div class="col-lg-4 col-md-4 col-sm-3 col-6">
            <div class="product__item card">
                <div class="product__item__pic set-bg" data-setbg="{{ asset($datas->t_product_file) }}">
                    @if ($datas->t_product_disc != 0)
                        <div class="product__discount__percent">-{{ $datas->t_product_disc }}%</div>
                    @endif
                    <ul class="product__item__pic__hover">
                        {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                        <li><a href="#" data-toggle="modal" data-target="#modal-shop" id="button-detail-product"
                                data-code="{{ $datas->t_product_code }}"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal-shop" id="button-cart-order"
                                data-code="{{ $datas->t_product_code }}"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product__item__text mb-2">
                    <h6><a href="#">{{ $datas->t_product_name }}</a></h6>
                    <h5>@currency($datas->t_product_price)</h5>
                </div>
            </div>
        </div>
    @endforeach
@endif
<script>
    $('.set-bg').each(function() {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });
</script>
