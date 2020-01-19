
<?php get_header(); ?>	

<body <?php body_class(); ?> id="custom-home-page" >

	<div id="home-body"style="background-image: url(<?php echo $src = the_post_thumbnail_url( '' ); ?> );">

	<div class="home-overlay"></div>
 		<?php wp_body_open(); ?>
 	</div>



</body>

 <?php wp_footer(); ?>