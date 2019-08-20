<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Tanggal</th>
        <th>Faktur Penjualan</th>
        <th>Pelanggan</th>
        <th>Outlet</th>
        <th>Nomor Resep</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Ppn</th>
        <th>Diskon</th>
        <th>Total</th>
        <th>Jenis Transaksi Penjualan</th>
        <th>Bayar</th>
        {{--<th>Users Id</th>--}}
        <th>Point Diberikan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($penjualans as $penjualan)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td style="white-space: nowrap;">{!! $penjualan->created_at->format('j F Y - H:i') !!}</td>
            <td>{!! $penjualan->faktur_penjualan !!}</td>
            <td style="white-space: nowrap;">
                <b>Nama:</b> {!! $penjualan->pelanggan->user->name !!}<br>
                <b>Kontak:</b> {!! $penjualan->pelanggan->user->kontak !!}<br>
                <code>{!! $penjualan->pelanggan_id !!}</code>
            </td>
            <td class="table-wight">{!! $penjualan->site->nama !!}</td>
            <td>{!! $penjualan->nomor_resep !!}</td>
            <td>{!! $penjualan->tanggal_jatuh_tempo !!}</td>
            <td>{!! $penjualan->ppn !!}</td>
            <td>{!! $penjualan->diskon !!}</td>
            <td>{!! $penjualan->total !!}</td>
            <td>{!! $penjualan->jenisTransaksiPenjualan->nama !!}</td>
            <td>{!! $penjualan->bayar !!}</td>
            {{--<td>{!! $penjualan->user->name !!}</td>--}}
            <td>{!! $penjualan->point !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['penjualans.destroy', $penjualan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('penjualans.show', [$penjualan->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('penjualans.edit', [$penjualan->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
