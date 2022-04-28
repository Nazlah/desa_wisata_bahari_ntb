<table class="table">
    <tr>
        <th>Name Content</th>

    </tr>
    @foreach ($data as $item)
        <tr>
            <td> {{ $item->name_content }}</td>
            <td>{{ $item->detail_content }}</td>
            <td>
                <button class="btn btn-warning"
                    onClick="show('{{ $item->content_kind_id }}','{{ $item->id }}')">Edit</button>
                <button class="btn btn-danger"
                    onClick="destroy('{{ $item->content_kind_id }}','{{ $item->id }}')">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
