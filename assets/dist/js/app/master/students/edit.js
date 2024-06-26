function load_classes(id) {
    $('#classes').find('option').not(':first').remove();

    $.ajax({
        url: base_url+'classes/classes_by_themes/' + id,
        type: 'GET',
        success: function (data) {
            var option = [];
            for (let i = 0; i < data.length; i++) {
                option.push({
                    id: data[i].id_classes,
                    text: data[i].name_classes
                });
            }
            $('#classes').select2({
                data: option
            })
        }
    });
}

$(document).ready(function () {

    ajaxcsrf();

    // Load classes By themes
    $('#themes').on('change', function () {
        load_classes($(this).val());
    });


    $('form#students input, form#students select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error has-success');
        $(this).nextAll('.help-block').eq(0).text('');
    });

    $('[name="jenis_kelamin"]').on('change', function () {
        $(this).parent().nextAll('.help-block').eq(0).text('');
    });

    $('form#students').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var btn = $('#submit');
        btn.attr('disabled', 'disabled').text('Подождите...');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: 'POST',
            success: function (data) {
                btn.removeAttr('disabled').text('Сохранить');
                if (data.status) {
                    Swal({
                        "title": "Успешно",
                        "text": "Данные успешно сохранены.",
                        "type": "success"
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = base_url+'students';
                        }
                    });
                } else {
                    console.log(data.errors);
                    $.each(data.errors, function (key, value) {
                        $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(value);
                        $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                        if (value == '') {
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                            $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
                        }
                    });
                }
            }
        });
    });
});