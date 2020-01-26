<?php

/**

* Template Name: Gallery Template

*

* @package WordPress

* @subpackage Twenty_Fourteen

* @since Twenty Fourteen 1.0

*/

	global $wp; 

	get_header();  
?>

	<div id="esther_chen-page">

		<a href="#" class="js-esther_chen-nav-toggle esther_chen-nav-toggle"><i></i></a>

		<aside id="esther_chen-aside" role="complementary" class="js-fullheight text-center"> 

			<nav id="esther_chen-main-menu" role="navigation">

				<ul>

					<!-- <li><a href="index.html">Home</a></li> -->

					<li class="<?php echo ($wp->request == 'portfolio') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/portfolio">Photography</a></li>
					
					<li class="<?php echo ($wp->request == 'videos') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/videos">Videos</a></li>
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

	$('.ngg-gallery-thumbnail-box')
		.addClass('col-12 col-sm-3 gallery-box')
		.removeClass('ngg-gallery-thumbnail-box');
		// .append('<div class="border__" style=" width: 90%; height: 94%; position: absolute; z-index: 1; background: #0717165c; box-sizing: border-box; border: 1px solid #fff; top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>');

		$('#da-thumbs').addClass('row');
		$('#da-thumbs .TotLi').addClass('col-sm-4');



	})(jQuery); 
</script>