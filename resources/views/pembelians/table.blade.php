<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>No</th>
        <th>Site</th>
        <th>Faktur Pembelian</th>
        <th>Faktur Distributor</th>
        <th>Distributor Id</th>
        <th>Tanggal Faktur</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Ppn</th>
        <th>Diskon</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>  
    @php
        $no = 1;
    @endphp
    @foreach($pembelians as $pembelian)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $pembelian->site->nama !!}</td>
            <td>{!! $pembelian->faktur_pembelian !!}</td>
            <td>{!! $pembelian->faktur_distributor !!}</td>
            <td>{!! $pembelian->distributor->nama !!}</td>
            <td>{!! $pembelian->tanggal_faktur !!}</td>
            <td>{!! $pembelian->tanggal_jatuh_tempo !!}</td>
            <td>{!! $pembelian->ppn !!}</td>
            <td>{!! $pembelian->diskon !!}</td>
            <td>{!! $pembelian->total !!}</td>    
            <td class="text-center ">
                {!! Form::open(['route' => ['pembelians.destroy', $pembelian->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pembelians.show', [$pembelian->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('pembelians.edit', [$pembelian->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
