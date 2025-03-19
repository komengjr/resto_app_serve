<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Product Item</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('app_product_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
            <label class="form-label" for="inputAddress">Product Name</label>
            <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Merah Muda" required/>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Category Product</label>
            <select name="category" class="form-control">
                <option value="">Choose Category</option>
                @foreach ($option as $item)
                <option value="{{$item->t_category_code}}">{{$item->t_category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Type Product</label>
            <select name="type" class="form-control" id="">
                <option value="">Choose Type</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Image</label>
            <input class="form-control" id="inputAddress" type="file" name="file" placeholder="Merah Muda" required/>
        </div>
        <div class="col-12">
            <label class="form-label" for="inputAddress2">Product Description</label>
            <textarea class="form-control" name="desc" id="" rows="5" required></textarea>
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
