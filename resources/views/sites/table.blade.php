<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Kode</th>
        <th>Store</th>
        <th>Nama</th>
        <th>Kontak</th>
        <th>Alamat</th>
        <th>Foto</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($sites as $site)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $site->kode !!}</td>
            <td>{!! $site->nama !!}</td>
            <td class="table-wight">{!! $site->nama !!}</td>
            <td>{!! $site->kontak !!}</td>
            <td class="table-wight">{!! $site->alamat !!}</td>
            <td><a href="{{asset($site->foto)}}" target="_blank"><img src="{{ asset($site->foto) }}" alt="{!! $site->nama !!}" width="100%"></a></td>
            <td class="text-center ">
                {!! Form::open(['route' => ['sites.destroy', $site->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sites.show', [$site->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('sites.edit', [$site->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
