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



