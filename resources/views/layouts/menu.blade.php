
{{--<li class=" navigation-header">--}}
    {{--<span data-i18n="nav.category.layouts">Master Aplikasi</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>--}}
{{--</li>--}}
<li class="{{ Request::is('home*') ? 'active' : '' }} nav-item">
    <a href="{!! ('home') !!}"><i class="fa fa-home"></i><span class="menu-title" data-i18n="nav.dash.main">Beranda</span></a>
</li>

<li class="{{ Request::is('beritas*') ? 'active' : '' }} nav-item">
    <a href="{!! route('beritas.index') !!}"><i class="fa fa-newspaper-o"></i><span class="menu-title" data-i18n="nav.dash.main">Berita</span></a>
</li>

@role('kasir')
<li class="{{ Request::is('vouchers*') ? 'active' : '' }} nav-item">
    <a href="{!! route('vouchers.index') !!}"><i class="fa fa-tags"></i><span class="menu-title" data-i18n="nav.dash.main">Voucher</span></a>
</li>

<li class="{{ Request::is('daerahs*') ? 'active' : '' }} nav-item">
    <a href="{!! route('daerahs.index') !!}"><i class="fa fa-map"></i><span class="menu-title" data-i18n="nav.dash.main">Daerah</span></a>
</li>

<li class=" nav-item"><a href="#"><i class="fa fa-flag"></i><span class="menu-title" data-i18n="nav.dash.main">Data Outlet</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('stores*') ? 'active' : '' }} nav-item">
            <a href="{!! route('stores.index') !!}"><i class="fa fa-map-marker"></i><span class="menu-title" data-i18n="nav.dash.main">Store</span></a>
        </li>
        <li class="{{ Request::is('sites*') ? 'active' : '' }} nav-item">
            <a href="{!! route('sites.index') !!}"><i class="fa fa-location-arrow"></i><span class="menu-title" data-i18n="nav.dash.main">Site</span></a>
        </li>
    </ul>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-shopping-cart"></i><span class="menu-title" data-i18n="nav.dash.main">Manajemen Produk</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('produsens*') ? 'active' : '' }} nav-item">
            <a href="{!! route('produsens.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Produsen</span></a>
        </li>
        <li class="{{ Request::is('distributors*') ? 'active' : '' }} nav-item">
            <a href="{!! route('distributors.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Distributor</span></a>
        </li>
        <li class="{{ Request::is('banks*') ? 'active' : '' }} nav-item">
            <a href="{!! route('banks.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Bank</span></a>
        </li>
        <li class="{{ Request::is('jenisTransaksiPenjualans*') ? 'active' : '' }} nav-item">
            <a href="{!! route('jenisTransaksiPenjualans.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Jenis Transaksi Penjualan</span></a>
        </li>
        {{--<li class="{{ Request::is('daerahs*') ? 'active' : '' }} nav-item">--}}
            {{--<a href="{!! route('daerahs.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Daerah</span></a>--}}
        {{--</li>--}}
        {{--<li class="{{ Request::is('vouchers*') ? 'active' : '' }} nav-item">--}}
            {{--<a href="{!! route('vouchers.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Voucher</span></a>--}}
        {{--</li>--}}
    </ul>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-shopping-basket"></i><span class="menu-title" data-i18n="nav.dash.main">Data Produk</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('produks*') ? 'active' : '' }} nav-item">
            <a href="{!! route('produks.index') !!}"><!-- <i class="fa fa-shopping-cart"></i> --><span class="menu-title" data-i18n="nav.dash.main">Produk</span></a>
        </li>
        <li class="{{ Request::is('produkHasAtributBarangs*') ? 'active' : '' }} nav-item">
            <a href="{!! route('produkHasAtributBarangs.index') !!}"><!-- <i class="icon-user"></i> --><span class="menu-title" data-i18n="nav.dash.main">Pengubah</span></a>
            </li>
        <li class="{{ Request::is('kategoris*') ? 'active' : '' }} nav-item">
            <a href="{!! route('kategoris.index') !!}"><!-- <i class="fa fa-folder-open"></i> --><span class="menu-title" data-i18n="nav.dash.main">Kategori</span></a>
        </li>
        <li class="{{ Request::is('satuans*') ? 'active' : '' }} nav-item">
            <a href="{!! route('satuans.index') !!}"><!-- <i class="fa fa-folder-open"></i> --><span class="menu-title" data-i18n="nav.dash.main">Satuan</span></a>
        </li>
        <li class="{{ Request::is('jenisBarangs*') ? 'active' : '' }} nav-item">
            <a href="{!! route('jenisBarangs.index') !!}"><!-- <i class="fa fa-folder-open"></i> --><span class="menu-title" data-i18n="nav.dash.main">Jenis Barang</span></a>
        </li>
        <li class="{{ Request::is('atributBarangs*') ? 'active' : '' }} nav-item">
            <a href="{!! route('atributBarangs.index') !!}"><!-- <i class="fa fa-folder-open"></i> --><span class="menu-title" data-i18n="nav.dash.main">Atribut Barang</span></a>
        </li>
        <li class="{{ Request::is('promosis*') ? 'active' : '' }} nav-item">
            <a href="{!! route('promosis.index') !!}"><!-- <i class="fa fa-folder-open"></i> --><span class="menu-title" data-i18n="nav.dash.main">Promosi</span></a>
        </li>
    </ul>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-line-chart"></i><span class="menu-title" data-i18n="nav.dash.main">Data Transaksi</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('penjualans*') ? 'active' : '' }} nav-item">
            <a href="{!! route('penjualans.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Penjualan</span></a>
        </li>
        <li class="{{ Request::is('pembelians*') ? 'active' : '' }} nav-item">
            <a href="{!! route('pembelians.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Pembelian</span></a>
        </li>
        <li class="{{ Request::is('jenisPembayarans*') ? 'active' : '' }} nav-item">
            <a href="{!! route('jenisPembayarans.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Jenis Pembayaran</span></a>
        </li>
    </ul>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-user-plus"></i><span class="menu-title" data-i18n="nav.dash.main">Data Pelanggan</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('pelanggans*') ? 'active' : '' }} nav-item">
            <a href="{!! route('pelanggans.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Pelanggan</span></a>
        </li>
        <li class="{{ Request::is('returnPenjualans*') ? 'active' : '' }} nav-item">
            <a href="{!! route('returnPenjualans.index') !!}"><i class=""></i><span class="menu-title" data-i18n="nav.dash.main">Return Penjualan</span></a>
        </li>
    </ul>
</li>
<li class=" nav-item"><a href="#"><i class="fa fa-list-ul"></i><span class="menu-title" data
    -i18n="nav.dash.main">Data Admin</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('users*') ? 'active' : '' }} nav-item">
            <a href="{!! route('users.index') !!}"><i class="icon-user dark font-medium-2"></i><span class="menu-title" data-i18n="nav.dash.main">User</span></a>
        </li>
        <li class="{{ Request::is('user_role*') ? 'active' : '' }} nav-item">
            <a href="{!! route('user_role.index') !!}"><i class="fa fa-cogs"></i><span class="menu-title" data-i18n="nav.dash.main">Hak Akses</span></a>
        </li>
        <li class="{{ Request::is('shiftKerjas*') ? 'active' : '' }} nav-item">
            <a href="{!! route('shiftKerjas.index') !!}"><i class="fa fa-cogs"></i><span class="menu-title" data-i18n="nav.dash.main">Shift Kerja</span></a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }} nav-item">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-cogs"></i><span class="menu-title" data-i18n="nav.dash.main">Role</span></a>
        </li>
        <li class="{{ Request::is('permissions*') ? 'active' : '' }} nav-item">
            <a href="{!! route('permissions.index') !!}"><i class="fa fa-cogs"></i><span class="menu-title" data-i18n="nav.dash.main">Permission</span></a>
        </li>
    </ul>
</li>



<!-- <li class=" navigation-header">
    <span data-i18n="nav.category.layouts">Setting Data</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li -->


@endrole

@role('admin')
<!-- <li class=" navigation-header">
    <span data-i18n="nav.category.layouts">Setting User</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
</li>
 -->


<!-- <li class="{{ Request::is('pelangganHasVouchers*') ? 'active' : '' }} nav-item">
    <a href="{!! route('pelangganHasVouchers.index') !!}"><i class="fa fa-cogs"></i><span class="menu-title" data-i18n="nav.dash.main">Pelanggan Has Voucher</span></a>
</li> -->

@endrole


{{--<li class="{{ Request::is('beritas*') ? 'active' : '' }} nav-item">--}}
    {{--<a href="{!! route('beritas.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Berita</span></a>--}}
{{--</li>--}}




<!-- <li class="{{ Request::is('produkHasRaws*') ? 'active' : '' }} nav-item">
    <a href="{!! route('produkHasRaws.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Produk Has Raws</span></a>
</li> -->
<li class="{{ Request::is('hargaJuals*') ? 'active' : '' }} nav-item">
    <a href="{!! route('hargaJuals.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Harga Juals</span></a>
</li>



<li class="{{ Request::is('stoks*') ? 'active' : '' }} nav-item">
    <a href="{!! route('stoks.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Stoks</span></a>
</li>
<li class="{{ Request::is('detilPenjualans*') ? 'active' : '' }} nav-item">
    <a href="{!! route('detilPenjualans.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Detil Penjualans</span></a>
</li>
<li class="{{ Request::is('kecamatans*') ? 'active' : '' }} nav-item">
    <a href="{!! route('kecamatans.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Kecamatans</span></a>
</li>
<!-- <li class="{{ Request::is('kelurahans*') ? 'active' : '' }} nav-item">
    <a href="{!! route('kelurahans.index') !!}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.dash.main">Kelurahans</span></a>
</li> -->
