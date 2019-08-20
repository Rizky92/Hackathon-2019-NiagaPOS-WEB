<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama Produk</th>
        <th>Bahan</th>
        <th>Jumlah</th>
        
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($produkid as $produkids)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            
            <td>{!! $produkids->nama !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['produkHasRaws.destroy', $produkids->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('produkHasRaws.show', [$produkids->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('produkHasRaws.edit', [$produkids->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
