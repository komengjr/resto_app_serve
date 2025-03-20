<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Master Table</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('app_table_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label class="form-label" for="inputAddress">Table Name</label>
            <input class="form-control" id="inputAddress" type="text" name="name" placeholder="Table 1" required/>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Category Table</label>
            <select name="category" class="form-control" required>
                <option value="">Choose Category</option>
                <option value="Single">Single</option>
                <option value="Doble">Doble</option>
                <option value="Multi">Multi</option>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Type Table</label>
            <select name="type" class="form-control" id="">
                <option value="">Choose Type</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </div>
        <div class="col-12">
            <label class="form-label" for="inputAddress2">Table Description</label>
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
