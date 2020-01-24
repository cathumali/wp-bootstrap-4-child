<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

	<div class="container">
		<div class="row">

			<?php if ( $default_sidebar_position === 'no' ) : ?>
				<div class="col-md-12 wp-bp-content-width">
			<?php else : ?>
				<div class="col-md-8 wp-bp-content-width">
			<?php endif; ?>

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					if ( have_posts() ) : ?>
						
						<div class="container">
						    <div class="row">
						        <div class="col-lg-12">
						            <div class="section-title">
						                <h2><?php the_archive_title( '<h2 class="page-title">', '</h1>' ); ?></h2>
						            </div>
											<?php
											/* Start the Loop */
											while ( have_posts() ) : the_post();
 											 
												get_template_part( 'template-parts/archive-content', get_post_format() );

											endwhile;

											the_posts_navigation( array(
												'next_text' => esc_html__( 'Newer Posts', 'wp-bootstrap-4' ),
												'prev_text' => esc_html__( 'Older Posts', 'wp-bootstrap-4' ),
											) );

										else :

											get_template_part( 'template-parts/archive-content', 'none' );

										?>
						        </div>
						    </div>
						</div>
						<?php endif; ?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<!-- /.col-md-8 -->

			<?php if ( $default_sidebar_position != 'no' ) : ?>
				<?php if ( $default_sidebar_position === 'right' ) : ?>
					<div class="col-md-4 wp-bp-sidebar-width">
				<?php elseif ( $default_sidebar_position === 'left' ) : ?>
					<div class="col-md-4 order-md-first wp-bp-sidebar-width">
				<?php endif; ?>
						<?php get_sidebar(); ?>
					</div>
					<!-- /.col-md-4 -->
			<?php endif; ?>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

<?php
get_footer();
