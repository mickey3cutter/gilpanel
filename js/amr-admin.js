jQuery(function() {
    jQuery("#gil_list").sortable({
        stop: function(event, ui) {
            amr_update_sortable_indexes();
        }
    });
    jQuery("#gil_list").disableSelection();
});

function amr_update_sortable_indexes() {

    var positions = new Array();

    jQuery('#gil_list > label > input:first-child').each(function(i, obj) {
        positions[i] = jQuery(this).attr('data-href');
    });

    var data = {
        action: 'update_menu_positions',
        menu_item_positions: positions.toString()
    };

    jQuery.post(ajaxurl, data, function(response) {});

}