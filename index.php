<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */


get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

<?php if ( get_theme_mod( 'blog_display_cover_section', 1 ) ) : ?>
	<?php if( get_theme_mod( 'blog_cover_title' ) || get_theme_mod( 'blog_cover_lead' ) || get_theme_mod( 'blog_cover_btn_text' ) ) : ?>
		<section class="jumbotron bg-white text-center wp-bs-4-jumbotron border-bottom">
			<div class="container">

				<h1 class="jumbotron-heading"><?php echo wp_kses_post( get_theme_mod( 'blog_cover_title' ) ); ?></h1>
				<p class="lead text-muted"><?php echo wp_kses_post( get_theme_mod( 'blog_cover_lead' ) ); ?></p>
				<?php if( get_theme_mod( 'blog_cover_btn_text' ) ) : ?><a href="<?php echo esc_url( get_theme_mod( 'blog_cover_btn_link' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'blog_cover_btn_text' ) ); ?></a><?php endif; ?>
			</div>
			<!-- /.container -->
		</section>
		<!-- /.jumbotron text-center -->
	<?php endif; ?>
<?php endif; ?>

	<div class="container">
		<div class="row">

			<header style="padding: 0 15px;">
				<h1 class="page-title "><?php single_post_title(); ?></h1>
			</header>

			<!-- Display all categories Start-->
			<div class="col-md-12 categories">
				<ul class="list-inline" style="text-align: center;">	 							
					<?php 
						$categories = get_categories();
						foreach($categories as $category) {
						   echo '
						   		<li class="list-inline-item">
						   			<span class="cat-links">
						   				<a href="' . get_category_link($category->term_id) . '" class="">' . $category->name . '</a>
						   			</span>
						   		</li> 
						   ';
						}
					 ?>
				 </ul>
			 </div>
			 <!-- Display all categories End-->

			<?php 
				if( get_theme_mod( 'blog_display_posts_slider', '1' ) && is_home() && !is_paged() ) {
					get_template_part( 'template-parts/posts-slider' );
				}
			 ?>
			<?php if ( $default_sidebar_position === 'no' ) : ?>
				<div class="col-md-12 wp-bp-content-width">
			<?php else : ?>
				<div class="col-md-8 wp-bp-content-width">
			<?php endif; ?>
				<div id="primary" class="content-area ">

					<h3 class="widget-title h3">LATEST</h3>

					<main id="main" class="site-main">
						<div  class="row">
							<?php
							if ( have_posts() ) :
 
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									// Include the Post-Format-specific template for the content.
									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;

								the_posts_navigation( array(
									'next_text' => esc_html__( 'Newer Posts', 'wp-bootstrap-4' ),
									'prev_text' => esc_html__( 'Older Posts', 'wp-bootstrap-4' ),
								) );

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>
						</div>
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

					<!-- Featured Posts Start -->

					<aside id="secondary" class="widget-area sidebar-1-area mt-3r card">
						<section style="padding:10px 35px;">

						<?php
						  $args = array(
						        'posts_per_page' => 5,
						        'meta_key' => 'meta-checkbox',
						        'meta_value' => 'yes'
						    );
						    $featured = new WP_Query($args);
							if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); ?>

								<?php if (has_post_thumbnail()) : ?>

											<h3 class="widget-title h3">FEATURED</h3>
											<a class="post-img" href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail(); ?>
											</a>
											<div class="post-body">
												<div class="post-meta">
													<a class="post-category cat-3" href="category.html"><?php the_category(', '); ?></a>
													<span class="post-date"><?php echo get_the_date('F j, Y'); ?></span>
												</div>
												<h5 class="post-title "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
											</div>

								<?php
							endif;
							endwhile; else:
							endif;
						?>
						</section>
					</aside>					
					<!-- Featured Posts End -->
										
				</div>
				<!-- /.col-md-4 -->
			<?php endif; ?>
		<!-- /.row -->
	</div>
	<!-- /.container -->
<?php
get_footer();
