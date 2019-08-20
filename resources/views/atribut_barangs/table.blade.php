<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Store Id</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($atributBarangs as $atributBarang)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $atributBarang->nama !!}</td>
            <td>{!! $atributBarang->store->nama !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['atributBarangs.destroy', $atributBarang->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('atributBarangs.show', [$atributBarang->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('atributBarangs.edit', [$atributBarang->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
