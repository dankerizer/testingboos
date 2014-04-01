<?php
$siteurl	= get_option('siteurl');
$themeurl	= $siteurl.'/wp-content/themes/'.get_option('template');
require_once(TEMPLATEPATH.'/inc/wp_bootstrap_navwalker.php');

//adding css
function danker_tambah_script(){
	//css 
    global $wp_styles;
    wp_enqueue_style( 'boostrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( ), '3.0.3' );
     wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css', array( ), '4.0.3' );
    
      wp_enqueue_style( 'danker-style', get_stylesheet_uri() );
    //javascript
    if( !is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("https://code.jquery.com/jquery-1.10.2.min.js"), false, '1.10.2',true);
		wp_enqueue_script('jquery');
    }
    wp_enqueue_script( 'boostrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.3', true );
	
}
add_action( 'wp_enqueue_scripts', 'danker_tambah_script' );
//REGISTER SIDEBAR
function danker_widgets_init() {
    register_sidebar( array(
    'name' => __( 'Main Sidebar', 'dankertheme' ),
    'id' => 'sidebar-widget',
    'description' => __( 'Main WIdget, which has its own widgets', 'dankertheme' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widheading"><span>',
    'after_title' => '</span></div>',
    ) );

}   
add_action( 'widgets_init', 'danker_widgets_init' );
register_nav_menu( 'header_nav', 'Menu di header' );
register_nav_menu( 'footer_nav', 'Menu di Footer' );


?>