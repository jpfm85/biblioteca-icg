<?php 

$header_height = is_front_page() ? get_custom_header()->height : 200;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Wide-Range 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140315

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title();?></title>
<?php wp_head(); ?>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="<?php echo get_stylesheet_uri();?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_stylesheet_directory_uri();?>/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_stylesheet_directory_uri();?>/fonts.css" rel="stylesheet" type="text/css" media="all" />
<style>
	<!--
	#header {
	
		height: <?php echo $header_height;  ?>px;
}
	
	#header-wrapper
{
	background: url(<?php header_image(); ?>) no-repeat bottom center;
	background-size: cover;
}
	-->
	
</style>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="#"><?php bloginfo('name'); ?></a></h1>
				<p><?php bloginfo('description'); ?></p>
			</div>
			<div id="social">
				
			</div>
		</div>
	</div>
	<div id="menu">
		<?php
	get_template_part( 'user-menu' );
	?>
			<?php 
		$primary_menu_args = array (
			'theme_location' => 'primary',
			'container_class' => '',
			'container_id' => '',
					
		);

		wp_nav_menu($primary_menu_args);

		?>

	</div>
	
	<div class="clearfix"></div>