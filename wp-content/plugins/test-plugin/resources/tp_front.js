jQuery(document).ready(function() {
    jQuery('select[name=stock_type]').change(function (e) {
        var variant = jQuery(this).val();
        jQuery.ajax({
            url: '',
            type: 'GET',
            data: {stock_type: variant},
            success: function (response) {
                var parsed = jQuery(jQuery.parseHTML(response)).find("div#stock-content").html();
                jQuery('#stock-content').html(parsed);
            }
        });
    });
});
