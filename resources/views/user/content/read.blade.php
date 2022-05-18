{{-- <table class="table">
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
</table> --}}
<div class="table-responsive mb-3">
    <table class="table align-items-center table-dark table-flush">
        <thead class="thead-dark">
            <tr>
                <th>Name Content</th>
                <th>Detail Content</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="list">
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

        </tbody>
    </table>
</div>
