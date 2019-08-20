<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Kontak</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($distributors as $distributor)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $distributor->nama !!}</td>
            <td>{!! $distributor->alamat !!}</td>
            <td>{!! $distributor->kota !!}</td>
            <td>{!! $distributor->kontak !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['distributors.destroy', $distributor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('distributors.show', [$distributor->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('distributors.edit', [$distributor->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
