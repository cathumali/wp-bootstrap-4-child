<?php
/**
* Template Name: About Page Template
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

 get_header(); 
 
 ?>	
 	<!-- Heading Start -->
	<div class="container-fluid heading__" >		
		<div id="heading__border">
			<div id="heading__title">
				<h1>Esther Chen</h1><p class="page_title_"><?php single_post_title(); ?> ME</p>
			</div>
		</div>
		<div class="row" style="">
			<div class="col-md-6 col-sm-12 right_cover" style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);"> 
				<div id="heading__overlay"></div>
 			</div>
			<div class="col-md-6 left_cover"></div>
		</div>
	</div>
	<!-- Heading End -->

	<div class="container about_content">
		<div class="row">

			<div class="col-md-12 wp-bp-content-width">

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
						while ( have_posts() ) : the_post(); 
					?>

						<div class="entry-content">
							<?php
								the_content( sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-bootstrap-4' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-4' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->

					 
					<?php
						endwhile; // End of the loop.
					?>

					</main>
				</div>
			</div> 
		</div>
 	</div>
 

 	<script type="">
 		
 		// Change nav style when scroll top to content div 
 		(function($) {

	 		$('.navbar').removeClass('bg-dark');
			var scrollEventHandler = function() {
			 if(isScrolledIntoView(document.getElementsByClassName('about_content')[0])) {
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

		})(jQuery); 





 	</script>

<?php
get_footer();
