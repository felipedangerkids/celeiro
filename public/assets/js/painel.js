$('#radioBtn a').on('click', function () {
      var sel = $(this).data('title');
      var tog = $(this).data('toggle');
      $('#' + tog).prop('value', sel);

      $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
      $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
});


$('#buyprice').maskMoney({
      allowNegative: false,
      thousands: '.',
      decimal: ','
});
$('#sellprice').maskMoney({
      allowNegative: false,
      thousands: '.',
      decimal: ','
});
$('#phone').mask('00 00000-0000');

$(document).ready(function(){
      // Busca dos estados
    $(function(){
        if($('[name="estado"]')){
            $.ajax({
                url: '/painel/buscaEstado',
                type: 'GET',
                success: (data) => {
                    // console.log(data);
                    for(var i=0; data.length>i; i++){
                        $('[name="estado"]').append('<option value="'+data[i].sigla+'" data-estado_id="'+data[i].id+'">'+data[i].sigla+' - '+data[i].titulo+'</option>');
                    }
                }
            });
        }
    });

    // Busca das cidades/municipios
    $(document).on('change', '[name="estado"]', function(){
        let estado_id = $(this).find(':selected').data('estado_id');
        let select = $(this).parent().parent().find('select[name="cidade"]');

        $.ajax({
            url: '/painel/buscaCidade/'+estado_id,
            type: 'GET',
            success: (data) => {
                // console.log(data);
                select.empty();
                select.append('<option value="">- Selecione uma Cidade -</option>');

                for(var i=0; data.length>i; i++){
                    select.append('<option value="'+data[i].titulo+'" data-cidade_id="'+data[i].id+'">'+data[i].titulo+'</option>');
                }
            }
        });
    });

    // Busca das cidades/municipios
    $(document).on('change', '[name="cidade"]', function(){
        let cidade_id = $(this).find(':selected').data('cidade_id');

        $.ajax({
            url: '/painel/buscaBairro/'+cidade_id,
            type: 'GET',
            success: (data) => {
                // console.log(data);
                if(data.length == 0){
                    $('.bairro_select').addClass('d-none').removeAttr('name');
                    $('.bairro_input').removeClass('d-none').attr('name', 'bairro');
                }else{
                    $('.bairro_select').removeClass('d-none').attr('name', 'bairro');
                    $('.bairro_input').addClass('d-none').removeAttr('name');
                }

                $('.bairro_select').empty();
                $('.bairro_select').append('<option value="">- Selecione um Bairro -</option>');

                for(var i=0; data.length>i; i++){
                    $('.bairro_select').append('<option value="'+data[i].titulo+'">'+data[i].titulo+'</option>');
                }
            }
        });
    });

    $(function(){
        var transportes = JSON.parse($('.transportes_json').val());
        if(ObjectLength(transportes) > 0){
            setTimeout(() => {
                $('[name="estado"]').val(transportes.estado);
                $('[name="estado"]').trigger('change');

                setTimeout(() => {
                    $('[name="cidade"]').val(transportes.cidade);
                    $('[name="cidade"]').trigger('change');

                    setTimeout(() => {
                        $('[name="bairro"]').val(transportes.bairro);
                    }, 800);
                }, 700);
            }, 600);
        }
    });
});

function ObjectLength( object ) {
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
};