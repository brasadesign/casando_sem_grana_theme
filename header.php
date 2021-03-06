<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package casando_sem_grana_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" type="image/x-icon">
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" type="image/x-icon">
<!-- GOOGLE FONTS -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic|Cuprum:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

<meta name="viewport" content="width=device-width">

<?php wp_head(); ?>

<script src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap/js/bootstrap.js"type="text/javascript"></script>
<link href="<?php bloginfo( 'template_url' ); ?>/js/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

<script>
	(function (url) {
	var	isSSL = document.location.protocol === 'https:',
	r7adUrl = (isSSL ? 'https:' : 'http:') + '//adv.r7.com/script?href=',
	pageUrl = (typeof url === 'undefined' ? document.location.href : url);
	document.write('<scr' + 'ipt src="' + r7adUrl + pageUrl + '"><\/scr' + 'ipt>');
	}());
</script>

</head>

<body <?php body_class(); ?>>

<script type="text/javascript" src="http://barra.r7.com/bariso.js"></script>

<div class="elemento-header"></div>

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<!-- Start Menu Devide -->
		<nav class="navbar navbar-inverse" role="navigation">
		 
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bar1">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <!-- <a class="navbar-brand" href="#">Site</a> -->
		  </div>

		  <div class="collapse navbar-collapse" id="bar1">
		    <ul class="nav navbar-nav">
		    	<?php
					$args = array(
					'type'                     => '',
					'child_of'                 => 0,
					'parent'                   => '',
					'orderby'                  => 'ID',
					'order'                    => 'ASC',
					'hide_empty'               => 0,
					'hierarchical'             => 1,
					'exclude'                  => '1',
					'include'                  => '',
					'number'                   => '4',
					'taxonomy'                 => 'category',
					'pad_counts'               => false );

					$categories = get_categories( $args );
					foreach( $categories as $category ) :
					$cat_ID = $category->term_id; // Get ID the category.
				?>

				<li data-category="<?php echo $cat_ID; ?>" class="dropdown active-toggle">
		        	<a href="<?php echo get_category_link( $category->term_id ); ?>" class="dropdown-toggle"><?php echo $category->name; ?><b class="caret"></b></a>
						<?php	
							$child_args = array( 'child_of' => $cat_ID, 'hide_empty' => 0, );
							$child_categories = get_categories( $child_args );
							//var_dump($child_categories);
						?>

				</li>
				<?php endforeach; ?>		      
		    </ul>

		  </div><!-- /.navbar-collapse -->
		  <!-- START | Toggle SubCategorias -->
		<?php
			$child_categories = get_categories('&child_of=2&hide_empty'); // List subcategories of category '4' (even the ones with no posts in them)
			echo '<ul id="child-2" class="sub-category-hide">';
			foreach ($child_categories as $subcategory) {
			  echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
			}
			echo '</ul>';
		?>

		<?php
			$child_categories = get_categories('&child_of=3&hide_empty'); // List subcategories of category '4' (even the ones with no posts in them)
			echo '<ul  id="child-3" class="sub-category-hide">';
			foreach ($child_categories as $subcategory) {
			  echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
			}
			echo '</ul>';
		?>

		<?php
			$child_categories = get_categories('&child_of=4&hide_empty'); // List subcategories of category '4' (even the ones with no posts in them)
			echo '<ul  id="child-4" class="sub-category-hide">';
			foreach ($child_categories as $subcategory) {
			  echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
			}
			echo '</ul>';
		?>

		<?php
			$child_categories = get_categories('&child_of=5&hide_empty'); // List subcategories of category '4' (even the ones with no posts in them)
			echo '<ul  id="child-5" class="sub-category-hide">';
			foreach ($child_categories as $subcategory) {
			  echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
			}
			echo '</ul>';
		?>
		<!-- AND | Toggle SubCategorias -->
		</nav>
		<!-- And Menu Devide -->

		<div id="img-header-left">
		</div><!-- #img-header-left -->
			<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home">
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
			</a>
		<div class="box-rss">
			<h2><a href="<?php echo home_url( '/feed' ); ?>" target="_blank"><?php bloginfo( 'description' ); ?></a></h2>
			<a class="rss-info" href="<?php echo home_url( '/feed' ); ?>" target="_blank"><?php echo of_get_option('rss_info'); ?></a>

		</div><!-- .box-rss -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
