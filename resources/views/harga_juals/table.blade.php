<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Produk</th>
        <th>Harga</th>
        <th>Start From</th>
        <th>Valid Until</th>
        <th>Site</th>  
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($hargaJuals as $hargaJual)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $hargaJual->produk->nama !!}</td>
            <td>{!! $hargaJual->value !!}</td>
            <td>{!! $hargaJual->start_from !!}</td>
            <td>{!! $hargaJual->valid_until !!}</td>
            <td>{!! $hargaJual->site->nama !!}</td>
            
            <td class="text-center ">
                {!! Form::open(['route' => ['hargaJuals.destroy', $hargaJual->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('hargaJuals.show', [$hargaJual->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('hargaJuals.edit', [$hargaJual->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
