<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Foto</th>
        <th>Mulai Promosi</th>
        <th>Akhir Promosi</th>
        <th>Created by Admin </th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($promosis as $promosi)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $promosi->judul !!}</td>
            <td>{!! $promosi->isi !!}</td>
            <td>{!! $promosi->foto !!}</td>
            <td>{!! $promosi->mulai_promosi !!}</td>
            <td>{!! $promosi->akhir_promosi !!}</td>
            <td>{!! $promosi->user->name !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['promosis.destroy', $promosi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('promosis.show', [$promosi->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('promosis.edit', [$promosi->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
