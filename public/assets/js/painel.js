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
                url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/',
                type: 'GET',
                success: (data) => {
                    // console.log(data);
                    for(var i=0; data.length>i; i++){
                        $('[name="estado"]').append('<option value="'+data[i].sigla+'">'+data[i].sigla+' - '+data[i].nome+'</option>');
                    }
                }
            });
        }
    });

    // Busca das cidades/municipios
    $(document).on('change', '[name="estado"]', function(){
        let sigla = $(this).val();
        let select = $(this).parent().parent().find('select[name="cidade"]');

        $.ajax({
            url: '/painel/buscaCidade/'+sigla,
            type: 'GET',
            success: (data) => {
                // console.log(data);
                select.empty();
                select.append('<option value="">- Selecione uma Cidade -</option>');

                for(var i=0; data.length>i; i++){
                    select.append('<option value="'+data[i].desc_cidade+'" data-cidade_id="'+data[i].cidade_id+'">'+data[i].desc_cidade+'</option>');
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
                      $('.bairro_select').removeClass('d-none').attr('name');
                      $('.bairro_input').addClass('d-none').removeAttr('name', 'bairro');
                }

                  $('.bairro_select').empty();
                  $('.bairro_select').append('<option value="">- Selecione um Bairro -</option>');

                  for(var i=0; data.length>i; i++){
                        $('.bairro_select').append('<option value="'+data[i].desc_bairro+'">'+data[i].desc_bairro+'</option>');
                  }
            }
        });
    });
});

