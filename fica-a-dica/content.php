<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
	<div class="featured-post">
		<?php _e( 'Featured post', 'twentytwelve' ); ?>
	</div>
	<?php endif; ?>
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>
		
	</header><!-- .entry-header -->

	<!-- displays child items -->
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class="storycontent">
                        <?php //the_content(__('(more...)')); ?>
                </div>
        </div>
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php if (current_theme_supports('post-thumbnails') && has_post_thumbnail()) : ?>
			<div class="post-thumb">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>	
	    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		        <div class="childPages">
                <ul>
                <?php
                    global $id;
                    $post_type = get_post_type( $id );
                    $pages = get_pages( 'post_type=' . $post_type . '&child_of=' . $id . '&parent=' . $id . '&sort_column=' . $order_by );

                    if ($pages) {
                        foreach ( $pages as $page ) { ?>

                            <?php $meta = get_post_meta( $page->ID ); ?>

                            <li>
                                <a href="<?php echo get_permalink( $page->ID ) ?>" rel="bookmark" title="Permanent Link to <?php echo esc_attr(strip_tags($page->post_title)); ?>"><?php echo $page->post_title; ?></a>
                                <?php if ($page->post_excerpt) { ?>
                    				<div class="excerpt">
                    				    <?php echo '<p>' . $page->post_excerpt;
                                            if ($meta['_links_to'] && $page->post_content) { ?>
                    			                <br />
                                                <span class="read_more"><a href="javascript:void(0)">[ Read More &rarr; ]</a></span>
                                            <?php } ?>
                                        <?php echo '</p>'; ?>
                    				</div>
			                    <?php } ?>
                                <?php if ($page->post_content) { ?>
                			        <div class="desc <?php echo $single; ?>">
                				        <?php echo html_tidy(wpautop($page->post_content)); ?>
                                        <span class="show_excerpt"><a href="javascript:void(0)">[ &larr; Show Excerpt ]</a></span>
                				    </div>
            			        <?php } ?>
                            </li>

                        <?php }
                    }
                ?>
                </ul>
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

	</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post -->