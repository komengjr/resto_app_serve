<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Setup Menu {{ $code }}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="card-body border-top p-4">
        <table id="table_setup" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->menu_name }}</td>
                        <td>
                            <span class="badge bg-success">menu aktif</span>
                        </td>
                        <td>{{ $datas->created_at }}</td>
                        <td class="text-center">
                            @php
                                $cek = DB::table('z_menu_user')->where('menu_code',$datas->menu_code)->where('access_code',$code)->first();
                            @endphp
                            @if ($cek)
                            <button class="btn btn-falcon-primary" id="button-aktivasi-menu{{ $datas->menu_code }}"
                                data-code="{{ $datas->menu_code }}" data-id="{{ $code }}">Aktif</button>
                            @else
                            <button class="btn btn-falcon-primary" id="button-aktivasi-menu{{ $datas->menu_code }}"
                                data-code="{{ $datas->menu_code }}" data-id="{{ $code }}">Not Aktif</button>
                            @endif
                        </td>
                    </tr>
                    <script>
                        $(document).on("click", "#button-aktivasi-menu{{ $datas->menu_code }}", function(e) {
                            e.preventDefault();
                            var code = $(this).data("code");
                            var id = $(this).data("id");
                            $('#button-aktivasi-menu{{ $datas->menu_code }}').html(
                                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
                            );
                            $.ajax({
                                url: "{{ route('master_akses_setup_menu_verif') }}",
                                type: "POST",
                                cache: false,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "code": code,
                                    "id" : id
                                },
                                dataType: 'html',
                            }).done(function(data) {
                                $('#button-aktivasi-menu{{ $datas->menu_code }}').html(data);
                            }).fail(function() {
                                $('#button-aktivasi-menu{{ $datas->menu_code }}').html('eror');
                            });

                        });
                    </script>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    new DataTable('#table_setup', {
        responsive: true
    });
</script>
