<table id="example" class="table display table-responsive table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Detil Penjualan Id</th>
        <th>Jumlah Return</th>
        <th>Total Return</th>
        <th>Alasan</th>
        <th>Kode Admin</th>
        <th>Site Id</th>
        <th>Users Id</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($returnPenjualans as $returnPenjualan)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $returnPenjualan->detil_penjualan_id !!}</td>
            <td>{!! $returnPenjualan->jumlah_return !!}</td>
            <td>{!! $returnPenjualan->total_return !!}</td>
            <td>{!! $returnPenjualan->alasan !!}</td>
            <td>{!! $returnPenjualan->kode_admin !!}</td>
            <td>{!! $returnPenjualan->site_id !!}</td>
            <td>{!! $returnPenjualan->users_id !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['returnPenjualans.destroy', $returnPenjualan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('returnPenjualans.show', [$returnPenjualan->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('returnPenjualans.edit', [$returnPenjualan->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
