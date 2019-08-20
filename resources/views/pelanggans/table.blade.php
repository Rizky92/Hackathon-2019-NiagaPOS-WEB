<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>ID User</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Pekerjaan</th>
        <th>Alamat</th>
        <th>Kontak</th>
        <th>Point Terkumpul</th>
        <th>Banyak Trx</th>
        <th>Total Trx</th>
        {{--<th>Site Id</th>--}}
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pelanggans as $pelanggan)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td class="table-wight text-uppercase">{!! $pelanggan->users_id !!}</td>
            <td class="table-wight text-uppercase text-bold-600">{!! $pelanggan->user->name !!}</td>
            <td class="table-wight"><code>{!! $pelanggan->user->email !!}</code></td>
            <td>{!! $pelanggan->jenis_kelamin !!}</td>
            <td class="table-wight">{{\Jenssegers\Date\Date::parse($pelanggan->tanggal_lahir)->format('l, j F Y')}}</td>
            <td>{!! $pelanggan->pekerjaan !!}</td>
            <td class="table-wight">{!! $pelanggan->alamat !!}</td>
            <td>{!! $pelanggan->user->kontak !!}</td>
            <td class="table-wight">{!! $pelanggan->point !!}</td>
            <td class="table-wight">{!! $pelanggan->penjualans->count() !!}</td>
            <td class="table-wight">{!! $pelanggan->penjualans->sum('total') !!}</td>
            {{--<td>{!! $pelanggan->site_id !!}</td>--}}
            <td class="text-center ">
                {!! Form::open(['route' => ['pelanggans.destroy', $pelanggan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pelanggans.show', [$pelanggan->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('pelanggans.edit', [$pelanggan->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
