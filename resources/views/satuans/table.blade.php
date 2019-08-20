<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Satuan Id</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($satuans as $satuan)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $satuan->nama !!}</td>
            <td>{!! $satuan->satuan_id !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['satuans.destroy', $satuan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('satuans.show', [$satuan->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('satuans.edit', [$satuan->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
