<form method="POST" enctype="multipart/form-data" id="image-upload" action="javascript:void(0)">
    @csrf
    <div class="row">
        <h1>Add Content</h1>
        <div class="col-md-6">
            <label for="content" class="form-label">Name Content</label>
            <input type="text" class="form-control" id="name_content" name="name_content" required autofocus>
            <input type="text" class="form-control" id="content_kind_name" name="content_kind_name"
                value="{{ $data }}" hidden>
            <input type="text" class="form-control" id="content_kind_id" name="content_kind_id"
                value="{{ $id }}" hidden>
            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}"
                hidden>

        </div>

        <div class="col-md-6">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" id="url" name="url" required>
        </div>

        {{-- <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div> --}}
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label> Content </label>
                <textarea class="form-control" id="content" placeholder="Enter the Description" name="content" rows="3"></textarea>
            </div>
        </div>

        <div class="col-md-12 mb-2">
            <div class="form-group">
                <input type="file" name="thumbnail" placeholder="Choose image" id="thumbnail" class="form-control">
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <img id="preview-image-before-upload" alt="preview image" style="width: 250px; " class="form-control">
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </div>
</form>
<script>
    ClassicEditor.create(document.querySelector('#content')).catch(error => {
        console.error(error);
    });
</script>



<script type="text/javascript">
    $(document).ready(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#thumbnail').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#image-upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var name_content = $("#content_kind_name").val();
            var id_content = $("#content_kind_id").val();
            debugger;
            $.ajax({
                type: 'POST',
                url: "{{ url('/user/contentKind/store') }}/" + name_content + "/" +
                    id_content,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    alert('Data Tersimpan');
                    $(".btn-close").click();
                    // alert(data);
                    read()
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        $("#name_content").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
            $("#url").val(Text);
        });
    });
</script>
