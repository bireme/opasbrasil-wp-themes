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
	<div id="content" class="narrowcolumn" role="main">
		<div class="highlightBox">
			<h2>Destaques</h2>
			<div class="highlight">
				<ul>
					<?php query_posts('meta_key=post_type&meta_value=destaque');  ?>  
					<?php if (have_posts()) : ?>  
					<?php while (have_posts()) : the_post(); ?>  
						<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<div class="thumb">
								<?php
									// If WordPress 2.9 or above and a Post Thumbnail has been specified
									if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
										the_post_thumbnail('post-highlight', array('class' => 'post-thumbnail', 'alt' => ''.get_the_title().''));
									}
									// Or if a custom field post image has been specified
									else if (get_post_meta($post->ID, 'image', true)) {
										$postimage = get_post_meta($post->ID, 'image', true);
										echo '<img src="'.$postimage.'" alt="'.get_the_title().'" />';
									}
								?>
							</div>
							<h4>
								<?php foreach((get_the_category()) as $category) { 
									if($category->cat_ID == get_post_meta($post->ID, 'main_category', true)) {
										echo $category->cat_name . ' ';
									}
								}?>
								<? //echo get_post_meta($post->ID, 'main_category', true) ?>
							</h4>
							<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<span class="resumo">
								<?php the_excerpt(); ?>
							</span>
						</li>
					<?php endwhile; else: ?>
					<?php endif; ?>	
				</ul>
			</div>
		</div>
		<div class="destaque2">
			<ul>
				<?php query_posts('meta_key=post_type&meta_value=destaque2');  ?>  
				<?php if (have_posts()) : ?>  
					<?php while (have_posts()) : the_post(); ?>  
						<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h4>
								<?php foreach((get_the_category()) as $category) { 
									if($category->cat_ID == get_post_meta($post->ID, 'main_category', true)) {
										echo $category->cat_name . ' ';
									}
								}?>
								<? //echo get_post_meta($post->ID, 'main_category', true) ?>
							</h4>
							<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<div class="thumb">
								<?php
									// If WordPress 2.9 or above and a Post Thumbnail has been specified
									if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
										the_post_thumbnail('post-destaque02', array('class' => 'post-thumbnail', 'alt' => ''.get_the_title().''));
									}
									// Or if a custom field post image has been specified
									else if (get_post_meta($post->ID, 'image', true)) {
										$postimage = get_post_meta($post->ID, 'image', true);
										echo '<img src="'.$postimage.'" alt="'.get_the_title().'" />';
									}
								?>
							</div>
							<span class="resumo">
								<?php the_excerpt(); ?>
							</span>
							<div class="spacer"></div>
						</li>
					<?php endwhile; else: ?>
					<?php endif; ?>	
			</ul>
		</div>
		<div class="destaque3">
			<ul>
				<?php query_posts('meta_key=post_type&meta_value=destaque3');  ?>  
				<?php if (have_posts()) : ?>  
					<?php while (have_posts()) : the_post(); ?>  
						<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h4>						
								<?php foreach((get_the_category()) as $category) { 
									if($category->cat_ID == get_post_meta($post->ID, 'main_category', true)) {
										echo $category->cat_name . ' ';
									}
								}?>
								<? //echo get_post_meta($post->ID, 'main_category', true) ?>
							</h4>
							<p class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
						</li>
					<?php endwhile; else: ?>
					<?php endif; ?>	
			</ul>
		</div>
	<div class="spacer"> </div>	
	</div>
	<div class="menu02">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Coluna_2') ) : ?>
	<?php endif; ?>
	</div>
<?php get_footer(); ?>
