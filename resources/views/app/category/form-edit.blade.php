<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Edit Category Product</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('app_category_update') }}" method="post">
        @csrf
        <div class="col-6">
            <label class="form-label" for="inputAddress">Category Name</label>
            <input class="form-control" id="inputAddress" type="text" name="name"
                value="{{ $data->t_category_name }}" required />
                <input type="text" name="code" value="{{ $data->t_category_code }}" hidden>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Category Status</label>
            <select name="status" class="form-control">
                @if ($data->t_category_status == 1)
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                @else
                    <option value="0">Tidak Aktif</option>
                    <option value="1">Aktif</option>
                @endif
            </select>
        </div>
        <div class="col-12">
            <label class="form-label" for="inputAddress2">Category Description</label>
            <textarea class="form-control" name="desc" id="" rows="5" required>{{ $data->t_category_desc}}</textarea>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Update</button>
        </div>
    </form>
</div>
