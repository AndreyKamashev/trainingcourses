banyak = Number(banyak);
$(document).ready(function () {
    if (banyak < 1 || banyak > 50) {
        alert('Maksimum input 50');
        window.location.href = base_url+"courses";
    }

    $('form#courses input').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error');
        $(this).next().text('');
    });

    $('form#courses').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var btn = $('#submit');
        btn.attr('disabled', 'disabled').text('Подождите...');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            method: 'POST',
            success: function (data) {
                btn.removeAttr('disabled').text('Сохранить');
                console.log(data);
                if (data.status) {
                    Swal({
                        "title": "Успешно",
                        "text": "Данные успешно сохранены.",
                        "type": "success"
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = base_url+'courses';
                        }
                    });
                } else {
                    if (data.errors) {
                        for (let i = 0; i <= data.errors.length; i++) {
                            $.each(data.errors[i], function (key, val) {
                                var j = $('[name="' + key + '"]');
                                j.closest('.form-group').addClass('has-error');
                                j.next().text(val);
                                if (val == '') {
                                    j.parent().addClass('has-error');
                                    j.next().text('');
                                }
                            });
                        }
                    }
                }
            }
        });
    });
});