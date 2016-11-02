$(document).ready(function() {

  //Accordion animation
  $('.panel').on('show.bs.collapse', function (e) {
    $('.panel-title').removeClass('accordion-title-animation');
    $(this).find('.panel-title').addClass('accordion-title-animation');
  });


});