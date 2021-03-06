<?php
/**
 * The template for displaying full width pages.
 * *
 * @package casando_sem_grana_theme
 * *
 * Template Name: Full Width
	*/

get_header(); ?>

	<div id="primary" class="page content-area content-page">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'content', 'box-category' ); ?>

			<section class="body_content-full">
				<div class="content-page">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div class="post">

						<div class="title-content-post">
							<h2><?php the_title(); ?></h2>
						</div><!-- .title-content-single -->
						
						<div class="content-full">
							<?php the_content(); ?>
						</div><!-- .content-post -->

					</div><!-- .body_autor-post -->
				<!-- </div> --><!-- .content-single -->

					<?php endwhile; else: ?>
						<p><?php //_e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>

				</div><!-- .content-single -->
			</section><!-- .body_content-single -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
