<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Kontak</th>
        <th>Store</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($produsens as $produsen) 
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $produsen->nama !!}</td>
            <td>{!! $produsen->alamat !!}</td>
            <td>{!! $produsen->kota !!}</td>
            <td>{!! $produsen->kontak !!}</td>
            <td>{!! $produsen->store_id !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['produsens.destroy', $produsen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('produsens.show', [$produsen->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('produsens.edit', [$produsen->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
