<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Category Product</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('app_category_save') }}" method="post">
        @csrf
        <div class="col-12">
            <label class="form-label" for="inputAddress">Category Name</label>
            <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Merah Muda" required/>
        </div>
        <div class="col-12">
            <label class="form-label" for="inputAddress2">Category Description</label>
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
