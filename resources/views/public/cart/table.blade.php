<div class="card bg-info text-white mb-4">
    <div class="card-body">
        <h5 class="card-title text-white mb-1">Table Booking</h5>
        <p class="card-text">Kode Meja : {{$data->m_table_master_code }}
            <br>
            Meja : {{$data->m_table_master_name}}
            <input type="text" name="table" id="pick-table" value="{{$data->m_table_master_code }}" hidden>
        </p>
    </div>
</div>
