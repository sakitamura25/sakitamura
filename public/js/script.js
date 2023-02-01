
$(function () {
  $('.accordion-username').click(function () {
    $('.menu').slideToggle(300);
  });
});


$(function () {
  var open = $('.modal-open'),
    close = $('.modal-btn'),
    container = $('#modal-container');

  open.on('click', function () {
    container.addClass('active');
    return false;
  });

  close.on('click', function () {
    container.removeClass('active');
  });
});
