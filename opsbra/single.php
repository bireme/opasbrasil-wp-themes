<?php
get_header();
?>
	<!-- Script LightBOX -->
	<script type="text/javascript" src="/wp-content/js/lightbox204/js/prototype.js"></script>
	<script type="text/javascript" src="/wp-content/js/lightbox204/js/scriptaculous.js?load=effects,builder"></script>
	<script type="text/javascript" src="/wp-content/js/lightbox204/js/lightbox.js"></script>
	<link rel="stylesheet" href="/wp-content/js/lightbox204/css/lightbox.css" type="text/css" media="screen" />
	<!-- FIM LIGHTBOX -->
	<div class="menu01">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Coluna_1') ) : ?>
		<?php endif; ?>
	</div>
	<div id="content" class="widecolumn" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<span class="newsDate"><?php the_time(__('F j, Y')) ?></span>
					<div class="entry">
					<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
			</div>
		</div>
		<div class="spacer"></div>
		<div class="newsInfo">
			<p>Escrito por: <span><?php the_author() ?></span><br>
			<?php the_time(__('F j, Y')) ?>
			</p>
		</div>
		<!--?php comments_template(); ?-->
		<?php endwhile; else: ?>
		<p>Desculpe, Notícia não encontrada</p>

<?php endif; ?>

	</div>
	<div class="menu02">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Coluna_2') ) : ?>
	<?php endif; ?>
	</div>
<?php get_footer(); ?>
