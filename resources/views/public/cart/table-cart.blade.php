<h5>Pilih Table :</h5>
<br>
<div class="row">
    @foreach ($data as $datas)
        <div class="col-lg-4 col-md-4 col-sm-3 col-6">
            <div class="product__item card" id="button-choosse-table-resto" data-code="{{$datas->m_table_master_code}}" data-dismiss="modal">
                {{-- <div class="product__item__pic set-bg" data-setbg="{{ asset($datas->t_product_file) }}">
                @if ($datas->t_product_disc != 0)
                    <div class="product__discount__percent">-{{ $datas->t_product_disc }}%</div>
                @endif
                <ul class="product__item__pic__hover">
                    <li><a href="#" data-toggle="modal" data-target="#modal-shop" id="button-detail-product"
                            data-code="{{ $datas->t_product_code }}"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modal-shop" id="button-cart-order"
                            data-code="{{ $datas->t_product_code }}"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div> --}}
                <div class="product__item__text mb-2">
                    <h6><a href="#" >{{ $datas->m_table_master_name }}</a></h6>
                    <h5><span class="badge bg-success text-white">Ready</span></h5>
                </div>
            </div>
        </div>
    @endforeach

</div>
