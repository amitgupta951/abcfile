jQuery(document).ready(function(){
    alert(drupalSettings.custom_variable);
    } );
    (function ($, Drupal) {
        passToDrupal = $('#myhiddenfield');
        $('#edit-submit--3').click(function (event) {
            calcRoute(address, $editparcel.fieldValue().toString())
        });
    })(jQuery, Drupal);

    function calcRoute(start, destination) {
        var request = {
            origin: start,
            destination: destination,
        };
        directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
            mydistance = result.routes[0].legs[0].distance.value;
            passToDrupal.val(age);//adds value to hidden field.
        }
        });
    }


    // (function ($) {
    //     $('.view-slideshow .view-content').slick({
    //       infinite: false,
    //       speed: 300,
    //       slidesToShow: 3,
    //       slidesToScroll: 1,
    //       arrows: true,
    //       responsive: [
    //       {
    //         breakpoint: 1024,
    //         settings: {
    //           slidesToShow: 3,
    //           slidesToScroll: 1,
    //         }
    //       },
    //     {
    //       breakpoint: 600,
    //       settings: {
    //         slidesToShow: 2,
    //         slidesToScroll: 2
    //       }
    //     },
    //   {
    //     breakpoint: 480,
    //     settings: {
    //       slidesToShow: 1,
    //       slidesToScroll: 1
    //     }
    //   }
    //   ]
    //   });
    //   })(jQuery);;
/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.bootstrap_barrio = {
    attach: function (context, settings) {

      var position = $(window).scrollTop();
        $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
          $('body').addClass("scrolled");
        }
        else {
          $('body').removeClass("scrolled");
        }
        var scroll = $(window).scrollTop();
        if (scroll > position) {
          $('body').addClass("scrolldown");
          $('body').removeClass("scrollup");
        } else {
          $('body').addClass("scrollup");
          $('body').removeClass("scrolldown");
        }
        position = scroll;
      });

      $('.dropdown-item a.dropdown-toggle').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    }
  };

})(jQuery, Drupal);
;
/**
 * @file
 * Affix for Bootstrap 4.
 * https://www.codeply.com/users/skelly
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.bootstrap_barrio_affix = {
    attach: function (context, settings) {
      var toggleAffix = function (affixElement, scrollElement, wrapper) {

        var height = affixElement.outerHeight(),
            top = wrapper.offset().top;

        if (scrollElement.scrollTop() >= top){
            wrapper.height(height);
            affixElement.addClass("affix");
        }
        else {
            affixElement.removeClass("affix");
            wrapper.height('auto');
        }

      };

      $('[data-toggle="affix"]').once().each(function () {
        var ele = $(this),
            wrapper = $('<div></div>');

        ele.before(wrapper);
        $(window).on('scroll resize', function () {
            toggleAffix(ele, $(this), wrapper);
        });

        // init
        toggleAffix(ele, $(window), wrapper);
      });
    }
  }
})(jQuery, Drupal);
;
