<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Product Stok</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="row gy-2 gx-2 align-items-center p-4">
        <div class="col-12">
            <label class="visually-hidden" for="autoSizingInput">Quantity</label>
            <input class="form-control text-center" id="qty_stok" type="number" placeholder="0"  onkeydown="keywordadd(this)"/>
            <input type="text" name="" id="parameter_code" value="{{$data->t_product_code}}" hidden>
        </div>
    </div>
    <div id="hasil-pencarian"></div>
</div>
