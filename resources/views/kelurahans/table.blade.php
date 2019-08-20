<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Kelurahan Id</th>
        <th>Website</th>
        <th>Telepon</th>
        <th>Fax</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Lurah</th>
        <th>Foto Lurah</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($kelurahans as $kelurahan)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $kelurahan->nama !!}</td>
            <td>{!! $kelurahan->kelurahan_id !!}</td>
            <td>{!! $kelurahan->website !!}</td>
            <td>{!! $kelurahan->telepon !!}</td>
            <td>{!! $kelurahan->fax !!}</td>
            <td>{!! $kelurahan->email !!}</td>
            <td>{!! $kelurahan->alamat !!}</td>
            <td>{!! $kelurahan->longitude !!}</td>
            <td>{!! $kelurahan->latitude !!}</td>
            <td>{!! $kelurahan->lurah !!}</td>
            <td>{!! $kelurahan->foto_lurah !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['kelurahans.destroy', $kelurahan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kelurahans.show', [$kelurahan->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('kelurahans.edit', [$kelurahan->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
