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

<?php 	if( $wp->request == 'drunk-chinese-class' || $wp->request == 'conde-nast' ) { ?>
<style type="">
	div#esther_chen-main * {
	    background: #000 !important;
	    
	}
</style>
<?php  } ?>
	<div id="esther_chen-page">

		<a href="#" class="js-esther_chen-nav-toggle esther_chen-nav-toggle"><i></i></a>

		<aside id="esther_chen-aside" role="complementary" class="js-fullheight text-center"> 

			<nav id="esther_chen-main-menu" role="navigation">

				<ul>
					<li class="title">Photos</li>
					
					<li class="<?php echo ($wp->request == 'portfolio') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/portfolio">Print Work</a></li>

					<li class="<?php echo ($wp->request == 'headshots') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/headshots">Headshots</a></li>

					<li class="<?php echo ($wp->request == 'stand-up') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/stand-up">Stand up</a></li>

					<li class="<?php echo ($wp->request == 'gallery') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/gallery">Gallery</a></li>
					---	

					<li class="title">Videos</li>


					<li class="<?php echo ($wp->request == 'weekly-takeout') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/weekly-takeout">Weekly Takeout</a></li>

					<li class="<?php echo ($wp->request == 'conde-nast') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/conde-nast">Condé Nast</a></li>

					<li class="<?php echo ($wp->request == 'drunk-chinese-class') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/drunk-chinese-class">Drunk Chinese Class</a></li>

					<li class="<?php echo ($wp->request == 'videos') ? 'esther_chen-active': ''; ?>"><a href="<?php echo get_site_url(); ?>/videos">Videos</a></li>
				</ul>

			</nav> 

		</aside> <!-- END esther_chen-ASIDE -->

		<div id="esther_chen-main" class="<?php echo ($wp->request == 'videos') ? 'videos_section': 'photos_section'; ?>" >

			<section class="esther_chen-section-2">

				<!-- Gif main image start -->
				<?php
				if (is_page( 'portfolio') || is_page( 'modeling') || is_page( 'gallery') || is_page( 'headshots') ):
				?>

					<?php  if(  wp_get_attachment_url( get_post_thumbnail_id() ) ) { ?>
					<div class="main_image"> 	

						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>">

					<?php }  else { ?>

					<div class="main_image" style="height: 30em; margin: 1em; border: 1px solid;"> 	
						<h5>Insert Feature Image</h5>
					<?php } ?>

					</div>
					
				<?php
				endif;
				?>
				<!-- Gif main image end -->

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
		.addClass('col-12 col-md-4 col-lg-3 gallery-box')
		.removeClass('ngg-gallery-thumbnail-box');
		// .append('<div class="border__" style=" width: 90%; height: 94%; position: absolute; z-index: 1; background: #0717165c; box-sizing: border-box; border: 1px solid #fff; top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>');

	$(document).on('refreshed',function(){
		console.log('dfd');
		jQuery('.ngg-gallery-thumbnail-box')
					.addClass('col-12 col-md-4 col-lg-3 gallery-box')
					.removeClass('ngg-gallery-thumbnail-box');
	});

		$('#da-thumbs').addClass('row');
		$('#da-thumbs .TotLi').addClass('col-sm-4');

		// $('#da-thumbs, .photograhy ul').addClass('row');
		// $('#da-thumbs .TotLi, .photograhy li').addClass('col-sm-4');

	})(jQuery); 
</script>