$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#whatsapp').mask('00 00000-0000');
$('#numero').mask('0000000000000000');
$('#validade').mask('00/00');
$('#cvv').mask('0000');
$('#cpf').mask('000.000.000-00');

$('#dinheiro').maskMoney({
    allowNegative: false,
    thousands: '.',
    decimal: ','
});

function face() {
    $("#face").addClass("heartbeat");
}
function insta() {
    $("#insta").addClass("heartbeat");
}
function faceOut() {
    $("#face").removeClass("heartbeat");
}
function instaOut() {
    $("#insta").removeClass("heartbeat");
}

setTimeout(() => {
    $(function () {
        if ($('#shipjson').val()) {
            var dados = JSON.parse($('#shipjson').val());

            $.each(dados, (key, value) => {
                $('[value="' + value + '"]').trigger('click');
            });
        }
    })
}, 1000);

$('.now').on('click', function () {

    var now = $('.now').attr('checked', true);
    if (now) {
        // console.log('e true');
        $('.times').removeClass("d-none");
    } else {
        console.log('e falso');
    }

});

$('.later').on('click', function () {

    var later = $('.now').attr('checked');
    if (later) {
        // console.log('e true');
        $('.times').addClass("d-none");
    } else {
        console.log('e falso');
    }

});
$('#primeiro').on('click', function () {

    var card = $('#primeiro').attr('checked', true);
    if (card) {
        // console.log('e true');
        $('#card').removeClass("d-none");
        $('#money').addClass("d-none");
    } else {
        console.log('e falso');
    }

});
$('#segundo').on('click', function () {

    var money = $('#segundo').attr('checked', true);
    if (money) {
        // console.log('e true');
        $('#money').removeClass("d-none");
        $('#card').addClass("d-none");
    } else {

    }

});
$('#phone').mask('00 00000-0000');

$(document).on('click', '.btn-verificar', function (e) {
    if ($('.tipo_entrega span').text() == 'Receber em Casa') {
        if ($('.transportes').val() == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Endereço Invalido!',
                text: "Por gentileza, coloque um endereço valido para receber ou escolha a opção de retirar em loja."
            });
        }
    }
});

$(document).on('click', '#enviar', function () {

    var dados = $('#form-checkout').serialize();

    var metodo = $('[name="metodo"]:checked').val();
    console.log(metodo);
    if (metodo == 'card') {
        var isValid = true;
        $('.req').each(function () {
            if ($(this).val() == '') {

                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (isValid) {
            $.ajax({
                url: 'checkout',
                type: 'POST',
                data: dados,
                success: (data) => {
                    console.log(data);
                    if (data[0] == 'success') {

                        window.location.href = 'pedido-concluido/'+data[1];
                    }

                },
                error: (err) => {
                    //   console.log(err.responseJSON);
                    if (err.responseJSON == 'refused') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Algo de Errado!',
                            text: "Compra não autorizada, certifique que todos os dados estão corretos"

                        });
                    }

                }

            });
        }
    } else {
        $.ajax({
            url: 'checkout',
            type: 'POST',
            data: dados,
            success: (data) => {
                console.log(data);
                if (data[0] == 'success') {

                    window.location.href = 'pedido-concluido/'+data[1];
                }

            },
            error: (err) => {
                //   console.log(err.responseJSON);
                if (err.responseJSON == 'refused') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Algo de Errado!',
                        text: "Compra não autorizada, certifique que todos os dados estão corretos"

                    });
                }

            }

        });
    }
});

$(document).ready(function () {
    $('#form-login').find('input').on('keyup', function (e) {
        if (e.keyCode == 13) {
            $('#btn-login').trigger('click');
        }
    });

    $('[name="cpf"]').mask('000.000.000-00');

    $(document).on('click', '#btn-login', function () {
        var btn = $(this);
        var form = $('#form-login').serialize();
        var url = $('#form-login').attr('action');
        btn.html('<div class="spinner-border text-light" role="status"></div>');
        btn.prop('disabled', true);
        $('#form-login').find('input').prop('disabled', true);
        $('#form-login').find('.invalid-feedbeck').remove();

        $.ajax({
            url: url,
            type: 'POST',
            data: form,
            success: (data) => {
                // console.log(data);

                window.location.href = data;
            },
            error: (err) => {
                // console.log(err);
                var errors = err.responseJSON.errors;

                btn.html('ENTRAR');
                btn.prop('disabled', false);
                $('#form-login').find('input').prop('disabled', false);

                if (errors) {
                    console.log(errors);
                    $.each(errors, (key, value) => {
                        $('#form-login').find('[name="' + key + '"]').parent().append('<span class="invalid-feedbeck">' + value[0] + '</span>');
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: err.responseJSON.invalid
                    });
                }
            }
        });
    });

    $(document).on('click', '.btn-edit-img', function () {
        $('#file-custom').trigger('click');
    });
    $(document).on('change', '#file-custom', function () {
        // $('.foto-perfil').empty();
        var route = $(this).data('route');
        var preview = '';
        var files = $(this).prop('files');

        function readAndPreview(file) {
            // Make sure `file.name` matches our extensions criteria
            if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                var reader = new FileReader();

                reader.addEventListener("load", function () {
                    // var image = new Image();
                    // image.classList = 'mx-auto';
                    // image.width = '100%';
                    // image.title = file.name;
                    // image.src = this.result;
                    preview = this.result;
                }, false);

                reader.readAsDataURL(file);
            }
        }

        if (files) {
            [].forEach.call(files, readAndPreview);
        }

        setTimeout(() => {
            $('.profile-photo').css({
                'background-image': 'url(' + preview + ')',
            });
        }, 500);

        var formData = new FormData();
        formData.append('img_profile',files[0]);

        $.ajax({
            url: route,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                // console.log(data);
            }
        });
    });

    // Cookies-Idade
    $('.btn-yes-cookie-idade').on('click', function(){
        $('.cookie-idade').css({
            'width': '0',
            'transition': '.6s width',
        });
        setCookie('cookie_maior18', 'SIM');
    });

    $(function(){
        if(!getCookie('cookie_maior18')){
            $('.cookie-idade').css('width', '100%');
        }
    })
});


function setCookie(name, value, duration) {
    var cookie = name + "=" + escape(value) +
    ((duration) ? "; duration=" + duration.toGMTString() : "");

    document.cookie = cookie;
}

function getCookie(name) {
    var cookies = document.cookie;
    var prefix = name + "=";
    var begin = cookies.indexOf("; " + prefix);

    if (begin == -1) {

        begin = cookies.indexOf(prefix);

        if (begin != 0) {
            return null;
        }

    } else {
        begin += 2;
    }

    var end = cookies.indexOf(";", begin);

    if (end == -1) {
        end = cookies.length;                        
    }

    return unescape(cookies.substring(begin + prefix.length, end));
}

function deleteCookie(name) {
    if (getCookie(name)) {
        document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}