<?php
	function register_my_menu() {
	  register_nav_menu('top-menu',__( 'Top Menu' ));
	}
	add_action( 'init', 'register_my_menu' );

	register_sidebar( array(
		'name' => __( 'Banner TV' ),
		'id' => 'tv-banner',
		'description' => __( 'Área de widget do banner' ),
		'before_widget' => '<div id="%1$s" class="widget top-tv">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar TV' ),
		'id' => 'tv-sidebar',
		'description' => __( 'Área de widget do sidebar' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-tv">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Conteúdo TV' ),
		'id' => 'tv-content',
		'description' => __( 'Área de widget do Conteúdo' ),
		'before_widget' => '<div id="%1$s" class="widget content-tv">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
                'name' => __( 'widget rating' ),
                'id' => 'rating',
                'description' => __( 'Widget para avaliar as dicas' ),
                'before_widget' => '<div id="%1$s" class="widget content-tv">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
        ) );

?>
