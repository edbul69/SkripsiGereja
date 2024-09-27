<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyMCE Test</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <textarea id="testEditor">This is a test editor</textarea>
    <script>
        tinymce.init({
            selector: '#testEditor',
            plugins: 'lists link image media table code paste',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image media | code',
            menubar: false,
            height: 400,
            branding: false
        });
    </script>
</body>

</html>