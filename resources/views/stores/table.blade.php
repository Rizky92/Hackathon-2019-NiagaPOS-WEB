<table id="file-export" class="table display table-striped table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Kontak</th>
        <th>Alamat</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($stores as $store)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $store->kode !!}</td>
            <td>{!! $store->nama !!}</td>
            <td>{!! $store->kontak !!}</td>
            <td>{!! $store->alamat !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['stores.destroy', $store->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stores.show', [$store->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('stores.edit', [$store->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
