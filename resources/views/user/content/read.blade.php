<table class="table">
    <tr>
        <th>Name Content</th>

    </tr>
    @foreach ($data as $item)
    <tr>
        <td> <a href="{{ $item->name }}">{{ $item->name_content }}</a></td>
        <td>{{ $item->detail_content }}</td>
        <td>
            <button class="btn btn-warning" onClick="show('{{ $item->id }}')">Edit</button>
            <button class="btn btn-danger" onClick="destroy('{{ $item->id }}')">Delete</button>
        </td>
    </tr>
    @endforeach
</table>