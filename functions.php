<?php
if( ! function_exists( 'ct_mcbra_theme_setup' ) ) {
    function ct_mcbra_theme_setup() {
        register_nav_menus( array(
            'topo'       => __( 'Topo', 'mcbra' ),
			'principal'   => __( 'Principal', 'mcbra' ),
            'flutuante'      => __( 'Flutuante', 'mcbra' ),
			'rodape' => __( 'Rodapé', 'mcbra' ),
        ) );
        foreach ( glob( trailingslashit( get_template_directory() ) . 'inc/*.php' ) as $filename ) {
            include $filename;
        }
    }
}

add_action( 'after_setup_theme', 'ct_mcbra_theme_setup', 10 );

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1000, 1000, true );	
	add_image_size( 'thumbnail', 150, 9999 );
	add_image_size( 'img_gal', 230, 130 );
	add_image_size( 'medium', 300, 9999 );
	add_image_size( 'large', 640, 9999 );
	add_image_size( 'full', 9999, 9999 );
}

/*
add_filter( 'wp_title', 'title_for_home' );

function title_for_home( $title ) {
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = get_bloginfo( 'name' );
  } else {
	$title = the_title() . ' :: ' . get_bloginfo( 'name' );
  }

  return $title;
}*/

add_action('after_setup_theme', 'linkable_text');

function linkable_text() {
	if (!class_exists('LinkableTitleHtmlAndPhpWidget')) {
		include_once(TEMPLATEPATH.'/plugins/linkable_text.php');
	}
}

add_action('after_setup_theme', 'category_featured');

function category_featured() {
	if (!class_exists('category_featured_images')) {
		include_once(TEMPLATEPATH.'/plugins/category-featured-images.php');
	}
}

function set_default_meta($post_ID){
        $current_field_value = get_post_meta($post_ID,'Sort Order',true);
        $default_meta = '100'; // value
        if ($current_field_value == '' && !wp_is_post_revision($post_ID)){
                add_post_meta($post_ID,'Sort Order',$default_meta,true);
        }
        return $post_ID;
}
add_action('wp_insert_post','set_default_meta');

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") .
        "://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}
