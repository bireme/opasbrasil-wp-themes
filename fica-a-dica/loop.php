	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<header class="page-header">Dicas Recentes</header>
			<div class="article-list">
				<?php if ( have_posts() ) : ?>
									

					<?php while ( have_posts() ) : the_post(); ?>
					<?php
						$term_list = wp_get_post_terms($post->ID, 'area', array("fields" => "all"));
					?>					
					<article class="post-list-item">
						<?php if (current_theme_supports('post-thumbnails') && has_post_thumbnail()) : ?>
							<div class="thumb-img" id="area-<?php echo $term_list[0]->term_id; ?>">
		              			<div class="entry-image">
		                			<a href="<?php the_permalink(); ?>" rel="bookmark">
										<?php the_post_thumbnail('thumbnail', array('class' => 'list-img')); ?>
									</a>
								</div>
							</div>
						<?php endif ?>

						<div class="post-content">
				            <div class="entry-post-area">					            	
				            	<?php echo get_the_term_list($post->ID, 'area', '', ', '); ?>
				            </div>
							<time class="published" datetime="<?php echo get_the_time(); ?>"><?php the_time('j \d\e F \d\e Y');?> - <?php the_time('H:i'); ?></time>
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
					        
					        <div class="entry-comments">
  								<strong class="entry-comments-label"><?php _e('Comentários', ''); ?>:</strong>
 								<?php comments_number( 'nenhum comentário', 'um comentário', '% comentários' ); ?>.
							</div>
						</div>
						<div class="spacer"></div>

					</article>
					<?php endwhile; ?>

					<?php wp_pagenavi(); ?>

				<?php endif; ?>
			</div>

		</main><!-- .site-main -->
	</section><!-- .content-area -->