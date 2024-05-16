function resetForm(selector) {
    $(selector)[0].reset();

    if ($(selector).find('.summernote').length != 0) {
        $(selector).find('.summernote').summernote('code', '');
    }

    if ($(selector).find('.img-thumbnail').length != 0) {
        $(selector).find('.img-thumbnail').attr('src', "");
    }
    
    $('.custom-file-input').next('label').html('Pilih file');
    $('.preview-path_image').attr('src', '').hide();
    $('.select2').trigger('change');
    $('.tagging, .placeholder').trigger('change');
    $('.form-control, .custom-select, [type=radio], [type=checkbox], [type=file], .select2, .note-editor').removeClass('is-invalid');
    $('.invalid-feedback').remove();
}


function loopForm(originalForm) {
    for (field in originalForm) {
        if ($(`[name=${field}]`).attr('type') != 'file') {
            // if ($(`[name=${field}]`).hasClass('summernote')) {
            //     $(`[name=${field}]`).summernote('code', originalForm[field]);
            // } else if ($(`[name=${field}]`).attr('type') == 'radio') {
            //     $(`[name=${field}]`).filter(`[value="${originalForm[field]}"]`).prop(`checked`, true);
            // } else {
            //     $(`[name=${field}]`).val(originalForm[field]);
            // }

            $('select').trigger('change');
        } else{
            // $(`.preview-${field}`)
            //     .attr('src', originalForm[field])
            //     .show();
        }
    }
}

function showAlert(message, type) {
    let title = '';

    switch (type) {
        case 'success':
            title = 'Success'
            break;
        case 'danger':
            title = 'Failed'
            break;
       default:
            break;
    }

    if (session = 'Success') {
        $(document).ready(function() {
            toastr.success(message, 'Success');
    
            setTimeout(() => {
                $('.toasts-top-right').remove();
            }, 3000);
        });
    } else if (session = 'Failed') {
        // Code to show error message using toastr
        $(document).ready(function() {
            toastr.error(message, 'Error');
    
            setTimeout(() => {
                $('.toasts-top-right').remove();
            }, 3000);
        });
    }
}