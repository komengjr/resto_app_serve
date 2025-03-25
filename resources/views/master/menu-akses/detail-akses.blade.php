<div class="card-header">
    <div class="row align-items-center">
        <div class="col">
            <h5 class="mb-0">Data User</h5>
        </div>
        <div class="col-auto">
            <a class="btn btn-falcon-primary btn-sm" href="#!" data-bs-toggle="modal" data-bs-target="#modal-table"
                id="button-setup-menu" data-code="{{$id}}">
                <span class="far fa-list-alt fs--2 me-1"></span>Setup Menu</a>
        </div>
    </div>
</div>
<div class="card-body border-top p-2">
    <table id="example" class="table table-striped nowrap" style="width:100%">
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
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->access_code }}</td>
                    <td>
                        @if ($item->access_status == 1)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Not Aktif</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    new DataTable('#example', {
        responsive: true
    });
</script>
