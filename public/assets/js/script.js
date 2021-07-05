$('#whatsapp').mask('00 00000-0000');

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
    if(now )
    {
        // console.log('e true');
        $('.times').removeClass("d-none");
    }else{
        console.log('e falso');
    }

});

$('.later').on('click', function () {

    var later = $('.now').attr('checked', true);
    if(later )
    {
        // console.log('e true');
        $('.times').addClass("d-none");
    }else{
        console.log('e falso');
    }

});
