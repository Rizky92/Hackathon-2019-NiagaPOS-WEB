<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>tanggal</th>
        <th>No.Faktur</th>
        <th>Produk Id</th>
        <th>Harga Jual</th>
        <th>Jumlah</th>
        <th>Satuan Id</th>
        <th>Sub Total</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($detilPenjualans as $detilPenjualan)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td style="white-space: nowrap;">{!! $detilPenjualan->created_at->format('j F Y - H:i') !!}</td>
            <td>{!! $detilPenjualan->penjualan->faktur_penjualan !!}</td>
            <td>{!! $detilPenjualan->produk->nama !!}</td>
            <td>{!! $detilPenjualan->harga_jual !!}</td>
            <td>{!! $detilPenjualan->jumlah !!}</td>
            <td>{!! $detilPenjualan->satuan->nama !!}</td>
            <td>{!! $detilPenjualan->sub_total !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
