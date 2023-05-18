jQuery(document).ready(function ($) {
   $("#ow-create-post-button").on("click", function () {
        jQuery.ajax({
            type: "post",
            url: ajax_object.url,
            data: {
                action: 'ow_action4',
                security: ajax_object.nonce,
                title: $('#ow-post-title-text').val(),
                content: $('#ow-post-content-text').val()
            },
            success: function (result) {
                //console.log(result);
                alert("Post created");
            }
        });
    });
});