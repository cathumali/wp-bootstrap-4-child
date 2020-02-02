<?php
/**
* Template Name: About Page 2 Template
* @package WordPress 
*/

 get_header(); 
 

 ?>	
	<style type="text/css">
		
		#content {
			background: url("<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>");
		}


	</style>

	<!-- <div class="about_overlay"></div> -->

 	<div class="container about_content"  >
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
 

 <script type="text/javascript">
 	
 	(function($) {

 		$('#content').append('<div class="about_overlay"></div>');
 	})(jQuery); 

 </script>


 <?php
get_footer();