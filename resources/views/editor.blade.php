<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <h1>Classic editor</h1>
    <div id="editor">
        <p>This is some sample content.</p>
    </div>
    <script>
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                // Update the loader's progress.
                server.onUploadProgress(data => {
                    loader.uploadTotal = data.total;
                    loader.uploaded = data.uploaded;
                });

                // Return a promise that will be resolved when the file is uploaded.
                return loader.file
                    .then(file => server.upload(file));
            }

            // Aborts the upload process.
            abort() {
                // Reject the promise returned from the upload() method.
                server.abortUpload();
            }

            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open('POST', 'http://example.com/image/upload/path', true);
                xhr.responseType = 'json';
            }
        }


        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
