<?php
/**
 * casando_sem_grana_theme functions and definitions
 *
 * @package casando_sem_grana_theme
 */
/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework/inc/options-framework.php';

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php

}

include ( dirname( __FILE__ ) . "/options.php" );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'casando_sem_grana_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function casando_sem_grana_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on casando_sem_grana_theme, use a find and replace
	 * to change 'casando_sem_grana_theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'casando_sem_grana_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'post_destaque', 730, 9999 ); //730 pixels wide (and unlimited height)
		add_image_size( 'post_category', 300, 9999 ); //300 pixels wide (and unlimited height)
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'casando_sem_grana_theme' ),
	) );

	register_nav_menus( array(
		'secondary' => __( 'Menu do Rodape', 'casando_sem_grana_theme' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'casando_sem_grana_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // casando_sem_grana_theme_setup
add_action( 'after_setup_theme', 'casando_sem_grana_theme_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function casando_sem_grana_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Home', 'casando_sem_grana_theme' ),
		'id'            => 'sidebar-home',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Single', 'casando_sem_grana_theme' ),
		'id'            => 'sidebar-single',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Newsletter', 'casando_sem_grana_theme' ),
		'id'            => 'newsletter-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Redes Sociais', 'casando_sem_grana_theme' ),
		'id'            => 'redes-sociais-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="social-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'casando_sem_grana_theme_widgets_init' );


 /**
 * Enqueue scripts and styles.
 */
function casando_sem_grana_theme_scripts() {
	wp_enqueue_script ( 'jquery' );
	wp_enqueue_style( 'casando_sem_grana_theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'casando_sem_grana_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'casando_scripts', get_template_directory_uri() . '/js/scripts.js' );

	wp_enqueue_script( 'casando_sem_grana_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'actions', get_stylesheet_directory_uri() . '/inc/js/actions.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'casando_sem_grana_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


 /**
 * Chose your image for header.
 */
$args = array(
	'flex-width'    => true,
	'width'         => 651,
	'flex-height'    => true,
	'height'        => 158,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
);
add_theme_support( 'custom-header', $args );


function admin_casando_scripts() {
	wp_enqueue_script( 'categories-admin', get_stylesheet_directory_uri() . '/inc/js/categories-admin.js.js', array( 'jquery' ) );
	}
add_action('admin_head', 'admin_casando_scripts');


/**
* Disable Admin Bar for All Users.
*/
show_admin_bar(false);


add_filter ( 'wp_list_categories', 'span_before_link_list_categories' );
function span_before_link_list_categories( $list ) {
	$list = str_replace('<a href=','<span class="ring"></span><a href=', $list);
	return $list;
}

add_action('thesis_hook_after_post','my_related_posts');
function my_related_posts() {
	if (is_single()) {

		global $post;
		$current_post = $post->ID;
		$categories = get_the_category();

	foreach ($categories as $category) : ?>

	<div class="content-posts">
		<ul>
			<?php $posts = get_posts('numberposts=3&category='. $category->term_id . '&exclude=' . $current_post);
			foreach($posts as $post) : ?>

			<li>
				<figure>
					<div class="thumbnail th-post th-single-post">
						<?php the_post_thumbnail(); ?>
					</div>
				</figure><!-- .th-single-post -->

				<div class="title-single-post"><?php the_title(); ?></div><!-- .title-single-post -->

				<figcaption>
					<div class="excerpt-single-post"></div>
				</figcaption><!-- .excerpt-single-post -->

				<div class="info-single-post">
					<div class="date-single-post"></div><!-- .date-single-post -->
				</div><!-- .info-single-post -->
			</li>

		<?php endforeach; ?>
	<?php endforeach; ?>
		</ul>
	</div>
	<?php }	wp_reset_query();
}
	
/* My Excerpt Post Relacionados */
function my_excerpt_caracter( $limit = 80 ) {
	if ( strlen( get_the_excerpt() ) > $limit ) {
		$ini = strlen( get_the_excerpt() ) - $limit;
		$excerpt = substr(get_the_excerpt(), 0, -( $ini ));
	} else {
		$excerpt = get_the_excerpt() . '[...]';
	}

	echo $excerpt;
}

/* BREADCRUMBS - SINGLE */
function the_breadcrumb() {
    echo '<ul id="crumbs">';
    if (!is_home()) {
            echo '<li><a href="';
            echo get_option('home');
            echo '">';
            echo 'Home';
            echo " /</a></li>";
            if (is_category() || is_single()) {
                    echo '<li>';
                    the_category('</li><li class="child-cstegory">/ ');
                    if (is_single()) {
                            echo "</li><li>";
                            //the_title();
                            echo '</li>';
                    }
            } elseif (is_page()) {
                    echo '<li>';
                    echo the_title();
                    echo '</li>';
            }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

function custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<div class="div-avatar"><?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
	<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	</div>
	<span class="comment-point">•</span>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comment-meta commentmetadata">
		<?php
			/* translators: 1: date, 2: time */
			echo human_time_diff(get_comment_time('U'), current_time('timestamp')) . ' atrás'; ?>
			<?php edit_comment_link( __( '(Edit)' ), '  ', '' );
		?>
	</div>

	<div class="comment-text">
		<?php comment_text(); ?>

	<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	</div><!-- .comment-text -->

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php } 


function nav_posts() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

/* Add post ID to posts, pages admin columns */
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
}
function posts_custom_id_columns($column_name, $id){
        if($column_name === 'wps_post_id'){
                echo $id;
    }
}


function the_slug( $id ) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

if ( ! function_exists( 'wp_navi' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 * Based on paging nav function from Twenty Fourteen
 */

function wp_navi() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	$format = the_slug( get_option( 'page_for_posts' ) ) . "/" . $format;

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 3,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Anterior', 'yourtheme' ),
		'next_text' => __( 'Próximo &rarr;', 'yourtheme' ),
		'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'yourtheme' ); ?></h1>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

