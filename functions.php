<?php 
/**
 * Ibaslogic theme functions and definitions
 */

/**
 * Sets up theme defaults.
 */
function ibaslogic_theme_setup() {

	// Make theme available for translation
	load_theme_textdomain( 'ibaslogic', get_template_directory() . '/languages' );

	// Register Navigation Menu
	register_nav_menus( array(
		'primary'	=> __( 'Header Menu', 'ibaslogic' ), 
		'secondary'	=> __( 'Footer Menu', 'ibaslogic' ),
	) );
	// Activate Custom Background
	add_theme_support( 'custom-background' );
	// Activate Custom Header
	add_theme_support( 'custom-header' );
	// Activate Featured Image
	add_theme_support( 'post-thumbnails' ); 
	// Activate Post Formats
	add_theme_support( 'post-formats', array( 'image', 'quote' ) );

	// Switch default markup for comment list, comment form etc to output valid HTML5
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

}
add_action( 'after_setup_theme', 'ibaslogic_theme_setup' );



/**
 * Enqueue scripts and styles.
 */
function ibaslogic_load_scripts(){
	// Theme stylesheet
	wp_enqueue_style( 'boostrap-style',  get_template_directory_uri() . '/css/bootstrap.min.css', false, '4.1.0', 'all' );
	wp_enqueue_style( 'ibaslogic',  get_template_directory_uri() . '/css/ibaslogic.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', "https://fonts.googleapis.com/css?family=Raleway:400,700" );

	//wp_enqueue_style( 'font-awesome-cdn', "https://use.fontawesome.com/releases/v5.5.0/css/all.css" );
	wp_enqueue_style( 'font-awesome',  get_template_directory_uri() . '/css/all.min.css', array(), '5.5.0', 'all' );

	// wp_enqueue_style( 'dashicons');

	
	// Theme javascript
	wp_enqueue_script( 'boostrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.1.0', true );
	wp_enqueue_script( 'ibaslogic', get_template_directory_uri() . '/js/ibaslogic.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'ibaslogic_load_scripts' );


/**
 * Register widget area.
 */
function ibaslogic_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'ibaslogic' ),
		'id'            => 'ibaslogic-sidebar',
		'description'   => __( 'Add widgets here to appear in your main sidebar.', 'ibaslogic' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ibaslogic_widgets_init' );



/**
 * Custom Post Type
 */
function ibaslogic_custom_post_type() {
	$labels = array(
		'name'				=> __( 'Work', 'ibaslogic' ),
		'singular_name'		=> __( 'Work', 'ibaslogic' ),
		'add_new_item'		=> __( 'Add New Work', 'ibaslogic' ),
		'new_item'			=> __( 'New Work', 'ibaslogic' ),
		'edit_item'			=> __( 'Edit Work', 'ibaslogic' ),
		'view_item'			=> __( 'View Work', 'ibaslogic' ),
		'all_items'			=> __( 'All Work', 'ibaslogic' ),
		'search_items'		=> __( 'Search Work', 'ibaslogic' ),
		'not_found'			=> __( 'No Work found', 'ibaslogic' ),
		'not_found_in_trash'=> __('No Work found in trash', 'ibaslogic'),
	);
	$args = array(
		'labels'			=> $labels,
		'public'			=> true,
		'has_archive'			=> true,
		'publicly_queryable'	=> true,
		'query_var'			=> true,
		'rewrite'			=> array('slug' => 'work'),
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'supports'			=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'comments' ),
		//'taxonomies'		=> array( 'category', 'post_tag' ), 
	);

	register_post_type( 'ib_work', $args ); 
}
add_action( 'init', 'ibaslogic_custom_post_type' );


//Add Custom CSS class to navigation menu 
function remove_parent_class($class) {
    //check for current_page_parent class, return false if they exist
    return ($class == 'current_page_parent') ? FALSE : TRUE; 
}

function add_class_to_wp_nav_menu($classes, $item) {

	switch (get_post_type()) {
	    case 'ib_work':
	        // we're viewing a custom post type, so remove the 'current_page_parent' from Blog menu item.
	        $classes = array_filter($classes, "remove_parent_class");
	        // add the current_page_parent class to Work menu item.
	        if (714 == $item->ID) { //ive changed this the previous ID
	           $classes[] = 'current_page_parent';
	        }
	   		break; 
	    // add more cases if necessary and/or a default   
  	}
 	return $classes;

}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu',10, 2);

/**
 *  Add Custom Post type to Query
 */
// function add_custom_post_types_to_query ($query) {

// 	if( is_category() || is_tag() ) {
// 		$post_type = (get_query_var('post_type')) ? get_query_var('post_type') : array('nav_menu_item', 'post', 'ib_work' );
// 		$query->set( 'post_type', $post_type );

// 		return $query;
// 	}
	
// }
// add_filter( 'pre_get_posts', 'add_custom_post_types_to_query' );

/*
 *Pagination on custom query goes to 404 error page (Solved)
 */
function get_all_work_posts( $query ) {
        if( ! is_admin() && is_post_type_archive( 'ib_work' ) && $query->is_main_query() ) {
            $query->set( 'posts_per_page', '1' );
        }
    }
add_action( 'pre_get_posts', 'get_all_work_posts' );


/**
 *  Custom Taxonomies 
 */
function ibaslogic_custom_taxonomies() {
	//add new taxonomy hierarchical
	$labels = array(
		'name'			=> __( 'Work Types', 'ibaslogic' ),
		'singular_name' => __( 'Work Type', 'ibaslogic' ),
		'all_items'		=> __( 'All Work Types', 'ibaslogic' ),
		'edit_item'		=> __( 'Edit Work Type', 'ibaslogic' ),
		'view_item'		=> __( 'View Work Type', 'ibaslogic' ),
		'update_item'	=> __( 'Update Work Type', 'ibaslogic' ),
		'add_new_item'	=> __( 'Add New Work Type', 'ibaslogic' ),
		'new_item_name'	=> __( 'New Work Type Name', 'ibaslogic' ),
		'parent_item'	=> __( 'Parent Work Type', 'ibaslogic' ),
		'parent_item_colon'	=> __( 'Parent Work Type:', 'ibaslogic' ),
		'not_found'		=> __( 'No Work Types Found', 'ibaslogic' ),
		'search_items'	=> __( 'Search Work Types', 'ibaslogic' ),
	);
	$args = array(
		'labels' 		=> $labels,
		'hierarchical'	=> true,
		'show_ui'		=> true,
		'show_admin_column'	=> true,
		'rewrite'		=> array('slug' => 'work-type'),
		'query_var'		=> true,

	);
	register_taxonomy( 'work_type', 'ib_work', $args);

	//add new taxonomy NOT hierarchical
	register_taxonomy( 'work_tag', 'ib_work', array( 
		'label'    		=> 'Work Tags',
		'rewrite'  		=> array('slug' => 'work-tag'),
		'hierarchical'	=> false,
	) );		
}
add_action( 'init', 'ibaslogic_custom_taxonomies' );



/**
 *  Output buffering
 *  Eliminate type attribute 
 */
add_action('wp_loaded', 'ib_buffer_start'); 
function ib_buffer_start() { //Start output buffer
	// Use remove_type_attribute($buffer) function to eliminate the type attribute.
    ob_start("remove_type_attribute"); 
}

add_action('shutdown', 'ib_buffer_end');
function ib_buffer_end() { //end output buffer
    ob_end_flush(); 
}

function remove_type_attribute($buffer) {
	//modify buffer and return the updated code
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}


/**
 *  Removing the navigation role attribute
 */
add_filter( 'navigation_markup_template', 'remove_nav_role_attr' );
function remove_nav_role_attr( $template ) {
    $template = '
    <nav class="navigation %1$s">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>';

    return $template;
}