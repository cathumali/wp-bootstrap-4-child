<?php

/**

* Template Name: Gallery Template

*

* @package WordPress

* @subpackage Twenty_Fourteen

* @since Twenty Fourteen 1.0

*/



	get_header(); 

  

?>

	<div id="esther_chen-page">

		<a href="#" class="js-esther_chen-nav-toggle esther_chen-nav-toggle"><i></i></a>

		<aside id="esther_chen-aside" role="complementary" class="js-fullheight text-center"> 

			<nav id="esther_chen-main-menu" role="navigation">

				<ul>

					<!-- <li><a href="index.html">Home</a></li> -->

					<li class="esther_chen-active"><a href="<?php echo get_site_url(); ?>/portfolio">Photography</a></li>
					
					<li><a href="<?php echo get_site_url(); ?>/videos">Videos</a></li>
				</ul>

			</nav> 

		</aside> <!-- END esther_chen-ASIDE -->

		<div id="esther_chen-main">

			<section class="esther_chen-section-2">

				<div class="photograhy">

					<div class="row no-gutters">

						<?php

						while ( have_posts() ) : the_post();



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

							) 

							);



						endwhile; // End of the loop.

						?>

					</div>

					</div>

				</div>

			</section>

	

		</div><!-- END esther_chen-MAIN -->

	</div><!-- END esther_chen-PAGE -->



<?php

	get_footer();

?>	

<script type="text/javascript">



(function($) {

	$('.ngg-gallery-thumbnail').addClass('col-md-3');

	})(jQuery); 

</script>