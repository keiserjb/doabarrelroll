(function ($) {

  Drupal.behaviors.doaBarrelRoll =  {
    attach: function(context, settings) {
      $('#search-form, #search-block-form', context).keyup(function(event){
        if ($(this).find('input.form-text').val().toLowerCase() == 'do a barrel roll') {
          $('body').addClass('doabarrelroll');
        }
      });
    }, 
  };

 }(jQuery));
