(function ($) {
  'use strict';

  Drupal.behaviors.ding_event_calendar_admin = {
    attach: function (context, settings) {
      $('.tabledrag-toggle-weight-wrapper', context).hide();
      $('#library-items-table').appendTo('#edit-order-libraries-fieldset');
    }
  }
}) (jQuery);
