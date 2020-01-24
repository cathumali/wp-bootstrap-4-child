<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

?>

<div class="col-md-6">
	<div class="post">
		<a class="post-img" href="blog-post.html"><?php wp_bootstrap_4_post_thumbnail(); ?></a>
		<div class="post-body">
			<div class="post-meta">
				<a class="post-category cat-2" href="#">JavaScript</a>
				<span class="post-date">March 27, 2018</span>
			</div>
			<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
		</div>
	</div>
</div>



<div class="col-md-6">
	 <div class="post-entry-1 ">

	  	<?php wp_bootstrap_4_post_thumbnail(); ?>

	  	<div class="contents" style="background: #f8f9fa">

			<span class="cat-links">
				<span class="badge badge-light badge-pill"><?php the_category( '</span> <span class="badge badge-light badge-pill">' ); ?></span>
			</span>		

			<header class="entry-header">				
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title card-title h2">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title card-title h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-dark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta text-muted">
					<?php wp_bootstrap_4_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->

			<?php if( is_singular() || get_theme_mod( 'default_blog_display', 'excerpt' ) === 'full' ) : ?>
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
			<?php else : ?>
				<div class="entry-summary">
					<?php 
					// the_excerpt(); 
					?>
					<div class="">
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-sm"><?php esc_html_e( 'Read More', 'wp-bootstrap-4' ); ?> <small class="oi oi-chevron-right ml-1"></small></a>
					</div>
				</div><!-- .entry-summary -->
			<?php endif; ?>
	    </div>
	</div>
</div>