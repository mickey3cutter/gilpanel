<script src="http://malsup.github.com/jquery.form.js"></script>
<link rel='stylesheet' id='imgareaselect-css'  href='<?php echo plugin_dir_url( __FILE__ ) ?>css/plugin_page.css' type='text/css' media='all' />
<script type='text/javascript' src="<?php echo plugin_dir_url( __FILE__ ) ?>js/plugin_page.js"></script>
<div class="content">
	<form method="post" action="options.php" id="myOptionsForm">
	<fieldset>
		<legend>Hide admin menu</legend>
		<div class="form-group" id="gil_list">
			<?php 
			settings_fields( 'm3c_plugin_settings' );
			$option = get_option( 'm3c_option' ); 
			$pages_old = $GLOBALS[ 'admin_page_hooks' ];
			$pages_new = get_option('m3c_menu_positions', true);
			$pages = explode(',', $pages_new);
			if($pages[0]=='dashboard' || $pages_new=='1'){
				$pages = array_keys($pages_old);
			}
			//$count = -1;
			//$pages_uri = array_keys($pages11);

			foreach ($pages as $page) {  ?>
				<label class="m3c_<?php echo strtolower($page); ?>"><input id="m3c_option[<?php echo $page; ?>]" data-href="<?php echo $page; ?>" name="m3c_option[<?php echo $page; ?>]" type="checkbox" value="1" <?php checked( '1', isset($option[$page] )); ?> /> 
					<a href="<?php if(substr($page,0,3)!='edi' && substr($page,-3)!='php') { echo 'admin.php?page='.$page; } else { echo $page; } ?>"><?php echo ucfirst($pages_old[$page]); ?> </a></label>
			<?php }?>
		</div>
	<fieldset>
	<fieldset>
		<legend>Add custom view</legend>
		<div class="form-group">
			
			<label><input id="m3c_option[css]" name="m3c_option[css]" type="checkbox" value="1" <?php checked( '1', isset($option['css'] )); ?> /> <?php echo 'Add custom CSS' ?> </label>
			<label><input id="m3c_option[js]" name="m3c_option[js]" type="checkbox" value="1" <?php checked( '1', isset($option['js'] )); ?> /> <?php echo 'Add custom JS' ?> </label>
			<label><input id="m3c_option[logo_url]" name="m3c_option[logo_url]" type="checkbox" value="1" <?php checked( '1', isset($option['logo_url'] )); ?> /> <?php echo 'Change login logo url to site homepage' ?> </label>
			<!--<label class="check_open"><input id="m3c_option[footer_admin]" name="m3c_option[footer_admin]" type="checkbox" value="1" <?php checked( '1', isset($option['footer_admin'] )); ?> /> <?php echo 'Change admin footer' ?> </label>
			<!--<label class="input_open"><input id="m3c_option[footer_text]"  name="m3c_option[footer_text]" type="text" value='<?php echo $option['footer_text']; ?>' placeholder="Footer text"/></label> -->
			<label class="check_open"><input id="m3c_option[gil]" name="m3c_option[gil]" type="checkbox" value="1" <?php checked( '1', isset($option['gil'] )); ?> /> <?php echo 'Add Gilpanel view' ?> </label>
			<label class="input_open"><input id="m3c_option[color]"  name="m3c_option[color]" type="text" value='<?php echo $option['color']; ?>' placeholder="Main color"/></label>

		</div>
	<fieldset>
	<fieldset>
		<legend>Other</legend>
		<div class="form-group">
			<label><input id="m3c_option[admin_bar]" name="m3c_option[admin_bar]" type="checkbox" value="1" <?php checked( '1', isset($option['admin_bar'] )); ?> /> <?php echo 'Remove admin bar' ?> </label>
		</div>
	<fieldset>
	<p><input name="submit" id="submit" value="Save" type="submit"></p>
	</form>
	<div id="saveResult"></div>
</div>


<!-- Add ajax save btn -->
<!--  <script type="text/javascript">
jQuery(document).ready(function($) {
	 $('#myOptionsForm').submit(function() { 

      $(this).ajaxSubmit({
         success: function(){
            $('#saveResult').html("<div id='saveMessage' class='successModal'></div>");
            $('#saveMessage').append("<p><?php echo htmlentities(__('Settings Saved Successfully','wp'),ENT_QUOTES); ?></p>").show();
         }, 
         timeout: 5000
      }); 
      setTimeout("$('#saveMessage').hide('slow');", 5000);
      return false; 
   });
});
</script> -->