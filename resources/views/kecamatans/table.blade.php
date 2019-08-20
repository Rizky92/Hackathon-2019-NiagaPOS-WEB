<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Fax</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Camat</th>
        <th>Cover</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($kecamatans as $kecamatan)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $kecamatan->nama !!}</td>
            <td>{!! $kecamatan->telepon !!}</td>
            <td>{!! $kecamatan->email !!}</td>
            <td>{!! $kecamatan->alamat !!}</td>
            <td>{!! $kecamatan->fax !!}</td>
            <td>{!! $kecamatan->latitude !!}</td>
            <td>{!! $kecamatan->longitude !!}</td>
            <td>{!! $kecamatan->camat !!}</td>
            <td>{!! $kecamatan->cover !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['kecamatans.destroy', $kecamatan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kecamatans.show', [$kecamatan->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('kecamatans.edit', [$kecamatan->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
