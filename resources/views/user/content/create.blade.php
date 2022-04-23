<form action="javascript:void(0)" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
    <h1>Content Kind</h1>
        <label for="content" class="form-label">Content</label>
        <input type="text" class="form-control" id="name_content" name="name_content" required autofocus>
    </div>

    <div class="form-group mt-2">
        <button class="btn btn-success" onClick="store('{{$data}}','{{$id}}','{{auth()->user()->id}}')">Add</button>
    </div>
</form>
