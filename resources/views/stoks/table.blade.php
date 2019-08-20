<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Site</th>
        <th>Produk Id</th>
        <th>Jumlah</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($stoks as $stok)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $stok->site->nama !!}</td>
            <td>{!! $stok->produk->nama !!}</td>
            <td>{!! $stok->jumlah !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
