<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php'); 


// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/assets/functions/disable-emoji.php'); 

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php'); 


// require_once(get_template_directory().'/assets/functions/vbtk.php'); 



// HIDE CUSTOM FIELDS WHEN CONSTANT IS NOT SET OR IS FALSE
if(!defined('WP_LOCAL') || !WP_LOCAL){
    add_filter('acf/settings/show_admin', '__return_false');
}
// SAVE ACF TO FILES
add_filter('acf/settings/save_json', function() {
    return get_stylesheet_directory() . '/custom-acf-json';
});
add_filter('acf/settings/load_json', function($paths) {
    $paths[] = get_stylesheet_directory() . '/custom-acf-json';
    return $paths;
});




require_once(get_template_directory().'/assets/functions/Mobile_Detect.php'); 
function body_class_device_detect( $classes ) {
	$detect = new Mobile_Detect;
    if ( $detect->isMobile() ) {
        $classes[] = 'device-mobile';
    }
    if ( $detect->isTablet() ) {
        $classes[] = 'device-tablet';
    }
    if (!$detect->isMobile() && !$detect->isTablet()){
        $classes[] = 'device-desktop';
    }
    return $classes;
}
add_filter( 'body_class', 'body_class_device_detect' );


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


function display_acf_button_object($button, $link_text = null) {
    $url = '#';
    $target = '';

    if(is_null($link_text) && isset($button['link_text']) && !empty($button['link_text'])) {
        $link_text = $button['link_text'];
    } else if(is_null($link_text)) {
        $link_text = "Learn More";
    }

    $class = isset($button['button_style']) ? $button['button_style'] : 'primary';
    switch($button['button_type']){
        case 'internal':
            $url = $button['button_post'];
            break;
        case 'email':
            $url = 'mailto:'.$button['email_address'];
            break;
        case 'external':
            $url = $button['external_url'];
            $target = 'target="_blank"';
            break;
        case 'file':
            $url = $button['file_download'];
            $target = 'target="_blank"';
            break;
    }
?>
    <a href="<?php echo $url; ?>" <?php echo $target; ?> class="button <?php echo $class; ?>"><?php echo $link_text; ?></a>
<?php
}