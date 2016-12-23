<?php
ob_start();
/*********************
INCLUDE NEEDED FILES
*********************/


// Theme support options
require_once(get_template_directory().'/inc/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/inc/cleanup.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/inc/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/inc/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/inc/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/inc/page-navi.php'); 

// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/inc/disable-emoji.php'); 

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/inc/editor-styles.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/inc/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/inc/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/inc/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/inc/admin.php'); 


/* ------------------------------
	MOBILE DETECT FUNCTIONALITY
	http://mobiledetect.net/
	$detect = new Mobile_Detect;
	$detect->isMobile()
	$detect->isTablet()
	$detect->isiOS()
	$detect->isAndroidOS()
------------------------------ */
require_once(get_template_directory().'/inc/Mobile_Detect.php'); 


// LOAD vbtkWP CORE (if you remove this, the theme will break)
require_once(get_template_directory().'/library/vbtk.php'); 

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
//require_once(get_template_directory().'/library/custom-post-type.php'); // you can disable this if you like

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
 require_once(get_template_directory().'/library/admin.php'); 

// SUPPORT FOR OTHER LANGUAGES (off by default)
// require_once(get_template_directory().'/library/translation/translation.php'); 

/*********************
MENUS & NAVIGATION
*********************/
// REGISTER MENUS
register_nav_menus(
	array(
		'top-nav' => __( 'The Top Menu' ),   // main nav in header
		'main-nav' => __( 'The Main Menu' ),   // main nav in header
		'footer-links' => __( 'Footer Links' ) // secondary nav in footer
	)
);

// THE TOP MENU
function vbtk_top_nav() {
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Top Menu', 'vbtktheme' ),  // nav name
    	'menu_class' => '',         // adding custom nav class
    	'theme_location' => 'top-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'vbtk_main_nav_fallback'      // fallback function
	));
} /* end vbtk main nav */

// THE MAIN MENU
function vbtk_main_nav() {
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'vbtktheme' ),  // nav name
    	'menu_class' => '',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'vbtk_main_nav_fallback'      // fallback function
	));
} /* end vbtk main nav */

// THE FOOTER MENU
function vbtk_footer_links() {
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'vbtktheme' ),   // nav name
    	'menu_class' => 'sub-nav',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'vbtk_footer_links_fallback'  // fallback function
	));
} /* end vbtk footer link */

// HEADER FALLBACK MENU
function vbtk_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => '',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// FOOTER FALLBACK MENU
function vbtk_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
SIDEBARS
*********************/

// SIDEBARS AND WIDGETIZED AREAS
function vbtk_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'vbtktheme'),
		'description' => __('The first (primary) sidebar.', 'vbtktheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'vbtktheme'),
		'description' => __('The offcanvas sidebar.', 'vbtktheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

}

/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function vbtk_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<?php printf(__('<cite class="fn">%s</cite>', 'vbtktheme'), get_comment_author_link()) ?> on
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'vbtktheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'vbtktheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'vbtktheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

?>