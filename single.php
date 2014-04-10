<?php
/**
 * The Template for displaying all single posts.
 *
 * @package casando_sem_grana_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single" role="main">

			<section id="body_menu-boxes">
				<div id="boxes">
					<div class="box">
						<!-- <span class="img-bullet"></span> -->
						<li id="box-1">
							<a id="img-1" class="img-menu-page" href=""></a><a>Por onde Começar?</a>
						</li>
					</div>
					<div class="box">
						<!-- <span class="img-bullet"></span> -->
						<li id="box-2">
							<a id="img-2" class="img-menu-page" href=""></a><a>Faça você mesmo</a>
						</li>
					</div>
					<div class="box">
						<!-- <span class="img-bullet"></span> -->
						<li id="box-3">
							<a id="img-3" class="img-menu-page" href=""></a><a>Lista de Casamento</a>
						</li>
					</div>
					<div class="box">
						<!-- <span class="img-bullet"></span> -->
						<li id="box-4">
							<a id="img-4" class="img-menu-page" href=""></a><a>Fornecedores Justos</a>
						</li>
					</div>
				</div><!-- #boxes -->
			</section><!-- #body_slides -->

			<div id="title-page">
				<span class="icon-single-title"></span>
				<?php the_title(); ?>
			</div><!-- .title-page -->

			<section class="body_content-posts">
				<nav class="content-posts">
					<ul>
						<li>
							<figure>
								<div class="thumbnail th-post th-single-post"></div>
							</figure><!-- .th-single-post -->

							<div class="title-single-post"></div><!-- .title-single-post -->

							<figcaption>
								<div class="excerpt-single-post"></div>
							</figcaption><!-- .excerpt-single-post -->

							<div class="info-single-post">
								<div class="date-single-post"></div><!-- .date-single-post -->
								<div class="coments-single-post"></div><!-- .coments-single-post -->
							</div><!-- .info-single-post -->
						</li>
					</ul>

					<div class="nagetation-single-pages">
						<span><a href="" class="prev"></a></span>
						<span><a href="" class="next"></a></span>
					</div><!-- .nagetation-single-pages -->

				</nav><!-- .content-posts -->
			</section><!-- .body_content-posts -->


		<?php// while ( have_posts() ) : the_post(); ?>
			<?php //get_template_part( 'content', 'single' ); ?>
			<?php //casando_sem_grana_theme_post_nav(); ?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				//if ( comments_open() || '0' != get_comments_number() ) :
					//comments_template();
				//endif;
			?>
		<?php //endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>