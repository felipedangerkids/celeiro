

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

    var later = $('.now').attr('checked', true);
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

                        window.location.href = 'pedido-concluido';
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
    }else{
        $.ajax({
            url: 'checkout',
            type: 'POST',
            data: dados,
            success: (data) => {
                console.log(data);
                if (data[0] == 'success') {

                    window.location.href = 'pedido-concluido';
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

