<?php
/**
 * Boletim OPS 
 * BIREME OPS OMS
 * ricardo.santos@bireme.org
 */
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Coluna_1', 
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
register_sidebar(array('name'=>'Coluna_2', 
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
register_sidebar(array('name'=>'sidebar-tv',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(130, 100, true);
        add_image_size('post-highlight', 265, 200, true);
        add_image_size('post-tv', 470, 264, true);
        add_image_size('post-destaque02', 130, 73, true);
}

#####Main Category######    
/* Use the admin_menu action to define the custom boxes */
add_action('admin_init', 'main_category_box');

/* Use the save_post action to do something with the data entered */
add_action('save_post', 'main_category_save');

/* Adds a custom section to the "advanced" Post and Page edit screens */
function main_category_box() {

	add_meta_box( 'myplugin_sectionid','Categoria Principal','main_category_inner_box', 'post', 'advanced' );
}
   
/* Prints the inner fields for the custom post/page section */
function main_category_inner_box() {

  global $post;
  
  $meta_values = get_post_meta($post->ID, 'main_category', true);
	
  // Use nonce for verification

  echo '<input type="hidden" name="maincategory_noncename" id="maincategory_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	$cat = get_categories(array('type' => 'post'));  
    
  // The actual fields for data entry
  echo '<label for="main_category">Categoria Principal:</label> ';
  echo '<select name="main_category">';
  foreach($cat as $c) {
  	if($c->cat_ID == $meta_values) { $select = "selected"; } else { $select = ""; }
  	echo '<option value="'.$c->cat_ID.'" '.$select.'>'.$c->name.'</option>';
  }
  echo '</select>'; 
}


/* When the post is saved, saves our custom data */
function main_category_save( $post_id ) {

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    
    // mais informações sobre nonces: http://markjaquith.wordpress.com/2006/06/02/wordpress-203-nonces/

    if ( !wp_verify_nonce( $_POST['maincategory_noncename'], plugin_basename(__FILE__) )) {
        return $post_id;
    }
    
    // verify if this is an auto save routine. If it is, our form has not been submitted, so we dont want
    // to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return $post_id;

    // Check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return $post_id;
    }

    // OK, we're authenticated: we need to find and save the data

	update_post_meta($post_id, 'main_category', ($_POST['main_category']));
	
    return $mydata;
}
?>
