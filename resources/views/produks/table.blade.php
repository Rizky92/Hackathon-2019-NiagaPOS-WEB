<table id="file-export" class="table display table-responsive table-bordered"> 
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama Produk</th>
        <th>Foto</th>
        <th>Barcode</th>
        <th>Kategori</th>
        <th>Ppn Persen</th>
        <th>Margin Persen</th>
        <th>Diskon Persen</th>
<!--         <th>Store Id</th> -->
        <th>Pembelian</th>
        <th>Penjualan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($produks as $produk)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td href="{!! route('produks.edit', [$produk->id]) !!}" class="btn-link">{!! $produk->nama !!}</td>
            <td>{!! $produk->foto !!}</td>
            <td>{!! $produk->barcode !!}</td>
            <td>{!! $produk->kategori->nama !!}</td>
            <td>{!! $produk->ppn_persen !!}</td>
            <td>{!! $produk->margin_persen !!}</td>
            <td>{!! $produk->diskon_persen !!}</td>
            <td>{!! $produk->pembelian !!}</td>
            <td>{!! $produk->penjualan !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['produks.destroy', $produk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('produks.show', [$produk->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('produks.edit', [$produk->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
