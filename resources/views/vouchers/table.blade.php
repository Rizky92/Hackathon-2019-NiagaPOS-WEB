{{--<div class="table-responsive">--}}
    <table id="file-export" class="table display table-responsive table-bordered">
        <thead>
        <tr class="text-center bg-grey bg-lighten-3 text-dark">
            <th>#</th>
            <th>Nama</th>
            <th>Point</th>
            <th>Foto</th>
            <th>Bonus Daftar</th>
            <th>Keterangan</th>
            <th>Admin</th>
            <th>Mulai Berlaku</th>
            <th>Akhir Berlaku</th>

            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($vouchers as $voucher)
            <tr>
                <td class="text-center ">{!! $no++ !!}</td>
                <td class="table-wight">{!! $voucher->nama !!}</td>
                <td>{!! $voucher->point !!}</td>
                <td><a href="{{asset($voucher->foto)}}" target="_blank"><img src="{{ asset($voucher->foto) }}" alt="{!! $voucher->nama !!}" width="100%"></a></td>
                <td>{!! $voucher->promo_awal==1?'Ya':'Tidak' !!}</td>
                <td>{!! $voucher->keterangan !!}</td>
                <td>{!! $voucher->name !!}</td>
                <td  class="table-wight">{!! !is_null($voucher->mulai_berlaku)?$voucher->mulai_berlaku->format('j F Y'):'' !!}</td>
                <td  class="table-wight">{!! !is_null($voucher->akhir_berlaku)?$voucher->akhir_berlaku->format('j F Y'):'' !!}</td>

                <td class="text-center ">
                    {!! Form::open(['route' => ['vouchers.destroy', $voucher->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('vouchers.show', [$voucher->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('vouchers.edit', [$voucher->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--</div>--}}
