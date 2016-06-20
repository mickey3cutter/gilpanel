<?php
$color = get_transient('m3c_color'); 
?>
<style>
@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=latin,latin-ext);
/*Login page*/

html body.login{
	background: #1A1A1A;
}
.login h1 a{
	background: url(<?php echo plugin_dir_url( __FILE__ ) ?>img/gilmedia-logo.png) no-repeat;
	width: 100%;
	height: 40px;
}
body.wp-core-ui .button-primary{
	position: relative;
	display: inline-block;
	background: <?php echo $color; ?>;
	padding: 0px 25px;
	height: 45px;
	line-height: 45px;
	color: #fff;
	font-size: 14px;
	text-transform: uppercase;
	border-radius: 2px;
	border: none;
	cursor: pointer;
	border: none !important;
	box-shadow: none;
}
.wp-core-ui .button-primary:hover{
	background: #000;
}
.login #nav,.login #backtoblog{
	display: none;
}
#login{
	position: absolute;
	left: 50%;
	margin-left: -160px;
	top: 50%;
	margin-top: -200px;
	padding-top: 0;
}
#loginform input:focus{
	border-color: <?php echo $color; ?>;
	box-shadow: none;
}
#loginform .input{
	color: #8e8e8e;
}
.login form{
	padding: 25px;
}
.login form .forgetmenot label{
	line-height: 42px;
}
input[type=checkbox]:checked:before{
	color: <?php echo $color; ?>;
}


/*Dashboard page*/
body,#wpadminbar *{
	font-family: 'Roboto Condensed', sans-serif;
}
.tablenav .tablenav-pages a:focus, .tablenav .tablenav-pages a:hover,#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu{
	background: <?php echo $color; ?>;
}
#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus,#adminmenu li:hover div.wp-menu-image:before,#collapse-menu:hover, #collapse-menu:hover #collapse-button div:after{
	color: <?php echo $color; ?>;
}
body #wp-admin-bar-wp-logo{
	display: none;
}
#adminmenu li a.wp-has-current-submenu .update-plugins, #adminmenu li.current a .awaiting-mod{
	background-color: #d54e21;
}
h1,h2,h3,h4{
	text-transform: uppercase;
	font-family: 'Roboto Condensed', sans-serif;
	color: #000000;
}
.about-wrap h1 span{
	color: <?php echo $color; ?>;
}
.about-wrap h1:after{
	content: "";
position: absolute;
left: 50%;
margin-left: -25px;
bottom: 0px;
width: 50px;
height: 2px;
background: <?php echo $color; ?>;
}
.about-wrap h1{
	position: relative;
	text-align: center;
	padding-bottom: 15px;
	margin-right: 0;
}
.about-wrap p{
	text-align: center;
}
#adminmenu .wp-submenu-head, #adminmenu a.menu-top{
	text-transform: uppercase;
}
#aioseop_top_button{
	height: auto;
	margin-bottom: 5px;
}
a:hover,.view-switch a.current:before,#wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar .ab-top-menu>li:hover>.ab-item, #wpadminbar .ab-top-menu>li>.ab-item:focus, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus,#wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, #wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar li .ab-item:focus:before, #wpadminbar li a:focus .ab-icon:before, #wpadminbar li.hover .ab-icon:before, #wpadminbar li.hover .ab-item:before, #wpadminbar li:hover #adminbarsearch:before, #wpadminbar li:hover .ab-icon:before, #wpadminbar li:hover .ab-item:before, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover,#wpadminbar>#wp-toolbar a:focus span.ab-label, #wpadminbar>#wp-toolbar li.hover span.ab-label, #wpadminbar>#wp-toolbar li:hover span.ab-label,
#adminmenu li.opensub>a.menu-top, #adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before{
	color: <?php echo $color; ?>;
}
#adminmenu div.wp-menu-name{
	padding: 12px 0;
}
div.wp-menu-image:before{
	padding: 11px 0;
}
body #toplevel_page_all-in-one-seo-pack-aioseop_class .wp-menu-image:before{
	content: "\f122" !important;
}
body #toplevel_page_all-in-one-seo-pack-aioseop_class .wp-menu-image{
	background: none !important;
}
a{
	color: #4a4a4a;
}
.wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large{
	width: auto;
	padding: 0px 25px;
	height: 45px;
}
#delete-action{
	line-height: 42px;
}
input[type=text]:focus,textarea:focus,input[type=checkbox]:focus{
	border-color: <?php echo $color; ?>;
	box-shadow: none;
}
.plugins .active td, .plugins .active th{
	background: #f5f5f5;
}
#adminmenu{
	padding-top: 40px; 
	background: url(<?php echo plugin_dir_url( __FILE__ ) ?>img/gilpanel.png) 10px 12px no-repeat;
	background-size: 130px;
}
#footer-thankyou{
	font-style: normal;
}
#footer-thankyou a:hover{
	text-decoration: none;
}

#wp-admin-bar-updates, #wp-admin-bar-comments, #wp-admin-bar-new-content{
	display: none;
}
#wpadminbar ul li#wp-admin-bar-my-account{
	background: #23282d;
}

.wrap .add-new-h2:hover{
	background: <?php echo $color; ?>;
}
#contextual-help-link-wrap{
	display: none;
}
.folded .wp-first-item.menu-top-first{
	background: url(img/gilpanel.png) 10px 50% no-repeat;
	background-size: 145px;
}
#toplevel_page_edit-post_type-acf{
	display: none;
}
</style>