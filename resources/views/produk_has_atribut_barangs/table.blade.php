<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Id produk</th>
        <th>Nama Produk</th>
        <th>Atribut</th>
        <th>Value</th> 
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1; 
    @endphp
    @foreach($produkHasAtributBarangs as $produkHasAtributBarang)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $produkHasAtributBarang->id !!}</td>
            <td>{!! $produkHasAtributBarang->nama !!}</td>
                <td>
                @foreach($produkHasAtributBarang->atributBarangs as $atributBarang)
                    {{$atributBarang->nama . ','}}
                @endforeach
                </td>
            <td class="text-center ">
                {!! Form::open(['route' => ['produkHasAtributBarangs.destroy', $produkHasAtributBarang->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('produkHasAtributBarangs.show', [$produkHasAtributBarang->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('produkHasAtributBarangs.edit', [$produkHasAtributBarang->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
