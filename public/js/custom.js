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

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loopForm(originalForm) {
    for (field in originalForm) {
        if ($(`[name=${field}]`).attr('type') != 'file') 
            {            
                $(`[name=${field}]`).val(originalForm[field]);
            }

        $('select').trigger('change');
    }
}

function loopErrors(errors) {
    $('.invalid-feedback').remove();

    if (errors == undefined) {
        return; 
    }

    for (error in errors) {
        $(`[name=${error}]`).addClass('is-invalid');

        if ($(`[name=${error}]`).hasClass('tagging')) {
            $(`<span class="error invalid-feedback">${errors[error][0]}</span>`) 
                .insertAfter($(`[name=${error}]`).next());
        } else if ($(`[name=${error}]`).hasClass('summernote')) {
            $('.note-editor').addClass('is-invalid');
            $(`<span class="error invalid-feedback">${errors[error][0]}</span>`) 
                .insertAfter($(`[name=${error}]`).next());
        } else if ($(`[name=${error}]`).hasClass('placeholder')) {
            $(`<span class="error invalid-feedback">${errors[error][0]}</span>`) 
                .insertAfter($(`[name=${error}]`).next());
        } else {
            if ($(`[name=${error}]`).length == 0) {
             $(`[name="${error}[]"]`).addClass('is-invalid');
             $(`<span class="error invalid-feedback">${errors[error][0]}</span>`) 
                .insertAfter($(`[name="${error}[]"]`).next());
            } else {
                if ($(`[name=${error}]`).next().hasClass('date') || $(`[name=${error}]`).next().hasClass('input-group-prepend')) {
                    $(`<span class="error invalid-feedback">${errors[error][0]}</span>`) .insertAfter($(`[name=${error}]`).next());
                    $('.date .date-text').css('border-radius', '0 .25rem .25rem 0');
                    $('.date-text').css('border-color', 'red');
                    $('.input-group-prepend').next().css('border-radius', '0 .25rem .25rem 0');
                } else {
                    $(`<span class="error invalid-feedback">${errors[error][0]}</span>`) 
                        .insertAfter($(`[name=${error}]`));
                }
            }
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