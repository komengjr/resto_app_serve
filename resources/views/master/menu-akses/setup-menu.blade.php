<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Setup Menu {{$code}}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="card-body border-top p-2">
        <table id="table_setup" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Akses</th>
                    <th>Status</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

            </tbody>
        </table>
    </div>
</div>
<script>
    new DataTable('#table_setup', {
        responsive: true
    });
</script>
