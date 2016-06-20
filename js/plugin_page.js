jQuery(document).ready(function($) {
	if($('.check_open input').is(":checked")){
		$('.check_open input:checked').parent().next('.input_open').show();
	}
	$('.check_open input').click(function() {
		$(this).parent().next('.input_open').slideToggle();
	});

	//Sortable
    $("#gil_list").sortable({
        stop: function(event, ui) {
            m3c_update_sortable_indexes();
        }
    });
    $("#gil_list").disableSelection();
	function m3c_update_sortable_indexes() {
	    var positions = new Array();
	    $('#gil_list > label > input:first-child').each(function(i, obj) {
	        positions[i] = $(this).attr('data-href');
	    });
	    var data = {
	        action: 'update_menu_positions',
	        menu_item_positions: positions.toString()
	    };
	    $.post(ajaxurl, data, function(response) {});
	}
});