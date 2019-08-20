<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Diskon Persen</th>
        <th>Margin Persen</th>
        <th>Tunai</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($jenisPembayarans as $jenisPembayaran)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $jenisPembayaran->nama !!}</td>
            <td>{!! $jenisPembayaran->diskon_persen !!}</td>
            <td>{!! $jenisPembayaran->margin_persen !!}</td>
            <td>{!! $jenisPembayaran->tunai !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['jenisPembayarans.destroy', $jenisPembayaran->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jenisPembayarans.show', [$jenisPembayaran->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('jenisPembayarans.edit', [$jenisPembayaran->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
