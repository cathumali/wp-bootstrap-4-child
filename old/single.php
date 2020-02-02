<?php

/**

 * The template for displaying all single posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post

 *

 * @package WP_Bootstrap_4

 */

	get_header();  

	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );

?>	

	<!-- Blog Post header start -->

	<div id="post-header" class="page-header">
		<!-- Blog Post image header start -->
		<div class="background-img" style="background-image: url(<?php echo get_the_post_thumbnail_url(null,'post-thumbnail'); ?>);">			
			<div id="heading__overlay"></div>
		</div>
		<!-- Blog Post image header end -->
		<div class="container heading_details">

			<div class="row">

				<div class="col-md-12">

					<div class="post-meta">

						<span class="cat-links">

							<span class="badge badge-light badge-pill"><?php the_category( '</span> <span class="badge badge-light badge-pill">' ); ?></span>

						</span>	

						<span class="post-date"><?php echo get_the_date();?></span>

					</div>

					<?php

					if ( is_singular() ) :

						the_title( '<h1 class="entry-title card-title h2">', '</h1>' );

					else :

						the_title( '<h2 class="entry-title card-title h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-dark">', '</a></h2>' );

					endif;

					?>

				</div>

			</div>

		</div>

	</div>

	<!-- Blog Post header end -->


	<div class="container blog_content__">

		<div class="row">

			<?php if ( $default_sidebar_position === 'no' ) : ?>

				<div class="col-md-12 wp-bp-content-width">

			<?php else : ?>

				<div class="col-md-9 wp-bp-content-width">

			<?php endif; ?>

				<div id="primary" class="content-area">

					<main id="main" class="site-main">

					<?php

					while ( have_posts() ) : the_post(); ?>

						<div class="section" style="min-height: 500px;    margin-top: 5.5em;">

							<div class="container">

								<div class="row">

									<!-- Post content -->

									<div class="col-md-12">

										<div class="section-row sticky-container">

											<div class="main-post">

												<?php the_content(); ?>

											</div>

											<div class="post-shares sticky-shares">

												<a href="https://www.facebook.com/theestherchen" class="share-facebook"><i class="fa fa-facebook"></i></a>

												<a href="https://www.instagram.com/TheEstherChen_/" class="share-instagram"><i class="fa fa-instagram"></i></a>

												<a href="https://www.youtube.com/channel/UCSSwvFt745Nprj15_4JuVFQ/featured" class="share-youtube"><i class="fa fa-youtube"></i></a> 

												<a href="mailto:TheEstherChen@gmail.com""><i class="fa fa-envelope"></i></a>

											</div>

										</div>



										<!-- ad -->

										<div class="section-row text-center">

											<a href="#" style="display: inline-block;margin: auto;">

												<img class="img-responsive" src="./img/ad-2.jpg" alt="">

											</a>
										</div>
									</div>
								</div>
							</div>
						</div>



					<?php

						the_post_navigation(array(

				            'prev_text' => esc_html__( '&laquo; Previous Post', 'wp-bootstrap-4' ),

				            'next_text' => esc_html__( 'Next Post &raquo;', 'wp-bootstrap-4' ),

				        ) );


						// If comments are open or we have at least one comment, load up the comment template.

						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;


					endwhile; // End of the loop.

					?>

					</main>

				</div>

			</div>



			<?php if ( $default_sidebar_position != 'no' ) : ?>

				<?php if ( $default_sidebar_position === 'right' ) : ?>

					<div class="col-md-3 wp-bp-sidebar-width">

				<?php elseif ( $default_sidebar_position === 'left' ) : ?>

					<div class="col-md-3 order-md-first wp-bp-sidebar-width">

				<?php endif; ?>

						<?php get_sidebar(); ?>

					</div>

			<?php endif; ?>

		</div>

	</div>


 	<script type="">
 		
 		// Change nav style when scroll top to content div 
 		(function($) {

	 		$('.navbar').removeClass('bg-dark');
			var scrollEventHandler = function() {
			 if(isScrolledIntoView(document.getElementsByClassName('blog_content__')[0])) {
			  	$('.navbar').removeClass('bg-dark');
 			  } else {
			  	$('.navbar').addClass('bg-dark');
			  }  
			}

			$(window).scroll(scrollEventHandler);

			function isScrolledIntoView(el) {
			    var elemTop = el.getBoundingClientRect().top;
			    var elemBottom = el.getBoundingClientRect().bottom;
			 
			    var isVisible = (elemTop >= 0) && (elemBottom >= window.innerHeight);
			    return isVisible;
			}
		// ==============================

		// ( $(window).width() < 992 )


		})(jQuery); 


 	</script>


<?php

get_footer();

