<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php $level2 = "level2"; ?>
<div class="top_sidebar">
	<div id="nav_menu-2" class="widget widget_nav_menu">
		<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
	</div>
</div>
<div id="primary" class="site-content">
	<div id="content" class="column column_1" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry-post-area">					            	
	        	<?php echo get_the_term_list($post->ID, 'area', '', ', '); ?>
	        </div>
			<time class="published" datetime="<?php echo get_the_time(); ?>"><?php the_time('j \d\e F \d\e Y');?> - <?php the_time('H:i'); ?></time>
			<?php get_template_part( 'content' ); ?>
			<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
	<div class="column column_2">
		<?php dynamic_sidebar( $level2 ); ?>
		<?php dynamic_sidebar( 'rating' ); ?>
	</div>
</div><!-- #primary -->
<?php get_footer(); ?>
