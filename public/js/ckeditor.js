import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        // Editor created successfully
    })
    .catch(error => {
        console.error(error);
    });
