<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
	<div class="menu01">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Coluna_1') ) : ?>
		<?php endif; ?>
	</div>
	<div id="content" class="narrowcolumn searchResult" role="main">
	<?php if (have_posts()) : ?>
		<h2 class="pagetitle">Resultados da Busca</h2>
		<ul>
		<?php while (have_posts()) : the_post(); ?>
			<li <?php post_class(); ?>>
				<h4>
					<?php foreach((get_the_category()) as $category) { 
						if($category->cat_ID == get_post_meta($post->ID, 'main_category', true)) {
							echo $category->cat_name . ' ';
						}
					}?>
					<? //echo get_post_meta($post->ID, 'main_category', true) ?>
				</h4>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<span class="newsDate"><?php the_time(__('F j, Y')) ?></span>
				<span class="excerpt"><?php the_excerpt(); ?> </span>
			</li>
		<?php endwhile; ?>
		</ul>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'kubrick')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'kubrick')) ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('Nenhum resultado encontrado', 'kubrick'); ?></h2>

	<?php endif; ?>

	</div>

	<div class="menu02">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Coluna_2') ) : ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
