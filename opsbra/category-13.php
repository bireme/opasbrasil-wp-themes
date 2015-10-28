<?php
get_header();
?>
	<div class="menu01">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Coluna_1') ) : ?>
		<?php endif; ?>
	</div>
	<div id="content" class="narrowcolumn" role="main">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php printf(__('%s'), single_cat_title('', false)); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php printf(__('%s'), single_tag_title('', false) ); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php printf(__('%s'), get_the_time(__('F jS, Y', 'kubrick'))); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php printf(__('%s'), get_the_time(__('F, Y', 'kubrick'))); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php printf(__('%s'), get_the_time(__('Y', 'kubrick'))); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e('Author Archive'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives'); ?></h2>
 	  <?php } ?>


		<div class="destaque2">
			<ul>
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
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>	
			</ul>
		</div>
		<div class="destaque3">
			<ul>
				<?php query_posts('meta_key=anexo&meta_value=opas');  ?>  
				<?php if (have_posts()) : ?>  
					<?php while (have_posts()) : the_post(); ?>  
						<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<p class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
						</li>
					<?php endwhile; else: ?>
					
				<?php endif; ?>	
			</ul>
		</div>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'kubrick')); ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'kubrick')); ?></div>
		</div>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.", 'kubrick').'</h2>', single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo('<h2>'.__("Sorry, but there aren't any posts with this date.", 'kubrick').'</h2>');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.", 'kubrick')."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>".__('No posts found.', 'kubrick').'</h2>');
		}
	  get_search_form();
	endif;
?>
	</div>

	<div class="menu02">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Coluna_2') ) : ?>
	<?php endif; ?>
	</div>
<?php get_footer(); ?>
