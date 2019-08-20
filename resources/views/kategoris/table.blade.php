<table id="example" class="table display table-striped table-bordered scroll-horizontal">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <!-- <th>Parent Kategori Id</th>
        <th>Left</th>
        <th>Right</th>
        <th>Nesting</th>
        <th>Store Id</th> -->
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($kategoris as $kategori)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $kategori->nama !!}</td>
            <!-- <td>{!! $kategori->parent_kategori_id !!}</td>
            <td>{!! $kategori->left !!}</td>
            <td>{!! $kategori->right !!}</td>
            <td>{!! $kategori->nesting !!}</td>
            <td>{!! $kategori->store_id !!}</td> -->
            <td class="text-center ">
                {!! Form::open(['route' => ['kategoris.destroy', $kategori->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kategoris.show', [$kategori->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('kategoris.edit', [$kategori->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
