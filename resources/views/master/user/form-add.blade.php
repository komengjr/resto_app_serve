<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add User</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('master_user_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
            <label class="form-label" for="inputAddress">Nama Lengkap</label>
            <input class="form-control" id="inputAddress" type="text" name="fullname" placeholder="amirull" required/>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Akses</label>
            <select name="akses" class="form-control" required>
                <option value="">Choose akses</option>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="kitchen">Kitchen</option>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Email</label>
            <input class="form-control" id="inputAddress" type="email" name="email" placeholder="example@example.com" required/>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">No Handphone</label>
            <input class="form-control" id="inputAddress" type="text" name="no_hp" placeholder="0892xxxxxxx" required/>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Username</label>
            <input class="form-control" id="inputAddress" type="text" name="username" placeholder="amir2920" required/>
        </div>
        <div class="col-6">
            <label class="form-label" for="inputAddress">Password</label>
            <input class="form-control" id="inputAddress" type="password" name="password" placeholder="******" required/>
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
