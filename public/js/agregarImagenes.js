
// BILLETERAS
$(document).ready(function () {
    $('#logo').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg', 'png', 'jpeg', 'svg'],
        maxFileSize: 1000,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: 'fas',
    });
});


