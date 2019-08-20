<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Waktu Mulai</th>
        <th>Waktu Selesai</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($shiftKerjas as $shiftKerja)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $shiftKerja->nama !!}</td>
            <td>{!! $shiftKerja->waktu_mulai !!}</td>
            <td>{!! $shiftKerja->waktu_selesai !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['shiftKerjas.destroy', $shiftKerja->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('shiftKerjas.show', [$shiftKerja->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('shiftKerjas.edit', [$shiftKerja->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
