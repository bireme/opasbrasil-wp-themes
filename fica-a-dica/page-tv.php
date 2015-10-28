<?php get_header('tv'); ?>

<div class="col-left">
	<div class="header">
	    <div class="top">
			<div id="logo">
				<img src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/image/logo-tv.png" />
			</div>
			<div class="headerWidget">
				<?php
				setlocale (LC_ALL, 'pt_BR');
				date_default_timezone_set("Brazil/East");
		            echo '<div class="date-block">';
		            echo '<div class="pub-wd">' . strftime('%A') . '</div>';
		            echo '<div class="pub-d">' . strftime('%d/%b') . '</div>';
		            echo '<div class="time">' . strftime('%I:%M') . '</div>';
		            echo '</div>';          
		        ?>
				<?php dynamic_sidebar( 'tv-banner' ); ?>
			</div>
	    </div>
		<div class="spacer"></div>	
	</div>
	<div class="tv-content">
		<div class="slideshow">
			<?php if ( $posts ) :
				foreach( $posts as $post ) :
						setup_postdata( $post );
						$term_list = wp_get_post_terms($post->ID, 'area', array("fields" => "all"));
					?>					
					<article class="post-list-item">
						<div class="content-head-tv">
							<div class="entry-post-area">					            	
				            	<?php echo get_the_term_list($post->ID, 'area', '', ', '); ?>
				            </div>
							<time class="published" datetime="<?php echo get_the_time(); ?>"><?php the_time('j \d\e F \d\e Y');?> - <?php the_time('H:i'); ?></time>	
							<div class="entry-comments">
					        	<i class="fa fa-comment-o"></i> <div class="comment-n"><?php comments_number( '0', '1', '%' ); ?></div>
							</div>
						</div>
						<div class="content-tv">
							<?php if (current_theme_supports('post-thumbnails') && has_post_thumbnail()) : ?>
								<div class="thumb-img" id="area-<?php echo $term_list[0]->term_id; ?>">
			              			<div class="entry-image">
			                			<a href="<?php the_permalink(); ?>" rel="bookmark">
											<?php the_post_thumbnail('thumbnail', array('class' => 'list-img')); ?>
										</a>
									</div>
								</div>
							<?php endif; ?>
							<div class="post-content">
								<strong class="entry-title">
					                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					            </strong>
					            <div class="entry-summary">
									<p>
										<?php echo get_the_excerpt(); ?>
									</p>
								</div>
								<?php
									$categories = get_the_term_list($post->ID, 'category', '', ', ');
									if ($categories) :
								?>
									<div class="entry-categories">
										<strong class="entry-cats-label"><?php _e('Categorias', ''); ?>:</strong>
										<span class="entry-cats-list"><?php echo $categories; ?></span>
									</div>
								<?php endif; ?>
								<?php
										$tags = get_the_term_list($post->ID, 'post_tag', '', ', ');
										if ($tags) :
						            ?>
										<div class="entry-tags">
											<strong class="entry-tags-label"><?php _e('Tags', ''); ?>:</strong>
						                <span class="entry-tags-list"><?php echo $tags; ?></span>
						              </div>
						        <?php endif; ?>
							</div>
							<div class="spacer"></div>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<?php dynamic_sidebar( 'tv-content' ); ?>
	</div>
</div>
<div class="col-right">
	<?php dynamic_sidebar( 'tv-sidebar' ); ?>
</div>
<?php get_footer('tv'); ?>