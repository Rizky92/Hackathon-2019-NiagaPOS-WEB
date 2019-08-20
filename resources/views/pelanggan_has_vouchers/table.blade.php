<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Pelanggan Id</th>
        <th>Voucher Id</th>
        <th>Point</th>
        <th>Users Id</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pelangganHasVouchers as $pelangganHasVoucher)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $pelangganHasVoucher->pelanggan_id !!}</td>
            <td>{!! $pelangganHasVoucher->voucher_id !!}</td>
            <td>{!! $pelangganHasVoucher->point !!}</td>
            <td>{!! $pelangganHasVoucher->users_id !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['pelangganHasVouchers.destroy', $pelangganHasVoucher->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pelangganHasVouchers.show', [$pelangganHasVoucher->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('pelangganHasVouchers.edit', [$pelangganHasVoucher->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
