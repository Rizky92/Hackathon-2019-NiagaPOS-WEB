<table id="file-export" class="table display table-responsive table-bordered">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Foto</th>
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
    @foreach($beritas as $berita)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $berita->judul !!}</td>
            <td data-toggle="popover" data-original-title="{!! $berita->isi !!}" data-trigger="click" data-html="true">
                {!! substr($berita->isi, 0, 30).'...' !!}
            </td>
            <td><img src="{{asset($berita->foto) }}"  width="100%"></td>
            <td>{!! $berita->user->name !!}</td>
            <td class="table-wight">{!! !is_null($berita->mulai_berlaku)?$berita->mulai_berlaku->format('j F Y'):'' !!}</td>
            <td class="table-wight">{!! !is_null($berita->akhir_berlaku)?$berita->akhir_berlaku->format('j F Y'):''  !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['beritas.destroy', $berita->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('beritas.show', [$berita->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('beritas.edit', [$berita->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
