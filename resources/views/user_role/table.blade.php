<table class="table display table-striped table-bordered scroll-horizontal" id="example">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>Id</th>
        <th>Nama Pengguna</th>
        <th>Hak</th>
        <th>Actions</th>
        \</tr>
    </thead>
    <tbody>
    @foreach($user_role as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                @foreach($item->roles as $role)
                    {{$role->display_name . ','}}
                @endforeach
            </td>
            <td>
                <a href="{!! route('user_role.edit', [$item->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>