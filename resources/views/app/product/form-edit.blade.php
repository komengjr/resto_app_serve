<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Edit Product Item</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('app_product_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="position-relative rounded-top overflow-hidden">
            <a class="d-block" href="#"><img class="img-fluid rounded-top"
                    src="{{ asset($data->t_product_file) }}" alt="" /></a><span
                class="badge rounded-pill bg-success position-absolute mt-2 me-2 z-index-2 top-0 end-0">New</span>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Product Name</label>
            <input class="form-control" id="inputAddress" type="text" name="name" value="{{$data->t_product_name}}" required/>
            <input type="text" name="code" value="{{$data->t_product_code}}" id="" hidden>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Category Product</label>
            <select name="category" class="form-control">
                <option value="">{{$data->t_category_name}}</option>
                @foreach ($option as $item)
                <option value="{{$item->t_category_code}}">{{$item->t_category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Type Product</label>
            <select name="type" class="form-control" id="">
                <option value="{{$data->t_product_type}}">{{$data->t_product_type}}</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Image</label>
            <input class="form-control" id="inputAddress" type="file" name="file" placeholder="Merah Muda"/>
        </div>
        <div class="col-12">
            <label class="form-label" for="inputAddress2">Product Description</label>
            <textarea class="form-control" name="desc" id="" rows="5" required>{{$data->t_product_desc}}</textarea>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required/>
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
</div>
