(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.anynameGlobal = {
    attach: function (context, settings) {

      console.log("Global!!");

    }
  };

})(jQuery, Drupal);