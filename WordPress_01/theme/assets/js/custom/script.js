//click on Form, scroll up
(function($) {
  $('#form').on('shown.bs.collapse', function (e) {
    $('html,body').animate({
      scrollTop: $(this).offset().top - 130
    }, 1000);
  });
}(jQuery));

// callapsible menu icons
(function($) {
  $('.collapse').on('shown.bs.collapse', function(){
    $(this).parent().find(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-up");
    }).on('hidden.bs.collapse', function(){
    $(this).parent().find(".fa-chevron-up").removeClass("fa-chevron-up").addClass("fa-chevron-down");
    });
}(jQuery));
