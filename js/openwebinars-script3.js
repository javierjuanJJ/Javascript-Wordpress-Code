jQuery(document).ready(function ($) {
   $("#ow-load-button").on("click", function () {
      jQuery.ajax({
         type: "post",
         url: ajax_object.url,
         data: {
             action: 'ow_action3',
             security: ajax_object.nonce,
         },
          success: function (result) {
              console.log("dentro");
              $('#wpbody-content').html(result);
          }
      });
   });
});