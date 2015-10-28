<?php
error_reporting(0);
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$top = "header"; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php include "../../plugins/bvs-site/bvs-themes/bvs-2012/bireme_archives/admin_configs.php"; ?>
		<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
		<![endif]-->

		<?php 

			$posts = get_posts(array(
					'meta_query' => array(
						array(
							'key' => 'exibir_na_tv',
							'value' => '1',
							'compare' => '==',
							'nopaging' => true
						)
					)
				));



			$delay = count($posts) * 4 * 2;// number of posts * delay * cycles; 
			echo "<meta http-equiv='refresh' content='" . $delay . "'>" ; 
		?>
		<?php wp_head(); ?>

<!-- include Cycle plugin -->
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		delay: -4000
	});
});
</script>
	</head>

	<body <?php body_class('page-tv'); ?>>
	<div class="container tv">
		
		
