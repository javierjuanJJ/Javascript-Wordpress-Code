jQuery(document).ready(function ($) {
   $("#ow-load-button").on("click", function () {
      jQuery.ajax({
         type: "post",
         url: ajax_object.url,
         data: {
             action: ajax_object.hook,
             security: ajax_object.nonce,
         },
          success: function (result) {
              $('.entry-content').html(result);
          }
      });
   });
   $("#ow-get-name").on("click", function () {
        jQuery.ajax({
            type: "post",
            url: ajax_object.url,
            data: {
                action: 'ow_action2',
                security: ajax_object.nonce,
                name: $('#ow-name').val()
            },
            success: function (result) {
                console.log(result);
            }
        });
    });
});