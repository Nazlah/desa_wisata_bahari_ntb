{{-- <table class="table">
    <tr>
        <th>Content Kind</th>
        <th>Detail</th>

    </tr>
    @foreach ($data as $item)
        <tr>
            <td> <a href="{{ $item->name_content_kind }}/{{ $item->id }}">{{ $item->name_content_kind }}</a>
            </td>
            <td>{{ $item->detail_content_kind }}</td>
            <td>
                <button class="btn btn-warning" onClick="show('{{ $item->id }}')">Edit</button>
                <button class="btn btn-danger"
                    onClick="destroy('{{ $item->name_content_kind, $item->id }}')">Delete</button>
            </td>
        </tr>
    @endforeach
</table> --}}


<div class="table-responsive mb-3">
    <table class="table align-items-center table-dark table-flush">
        <thead class="thead-dark">
            <tr>
                <th>Content Kind</th>
                <th>Detail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($data as $item)
                <tr>
                    <td> <a
                            href="{{ $item->name_content_kind }}/{{ $item->id }}">{{ $item->name_content_kind }}</a>
                    </td>
                    <td>{{ $item->detail_content_kind }}</td>
                    <td>
                        <button class="btn btn-warning" onClick="show('{{ $item->id }}')">Edit</button>
                        <button class="btn btn-danger"
                            onClick="destroy('{{ $item->name_content_kind }}','{{ $item->id }}')">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
