<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

?>

<div class="post-entry-2 d-flex">
    <div class="thumbnail" style="background-image: url(<?php echo get_the_post_thumbnail_url(null,'post-thumbnail'); ?>)"></div>
    <div class="contents">

		<div class="post-meta">
			<span class="cat-links">
				<span class="badge badge-light badge-pill"><?php the_category( '</span> <span class="badge badge-light badge-pill">' ); ?></span>
			</span>	
			<span class="post-date"><?php echo get_the_date();?></span>
		</div>

		<header class="entry-header">				
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title card-title h2">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title card-title h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-dark">', '</a></h2>' );
			endif;

		?>
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
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-sm">
						<?php esc_html_e( 'Learn More', 'wp-bootstrap-4' ); ?> 
						<small class="oi oi-chevron-right ml-1"></small>
					</a>
				</div>
			</div><!-- .entry-summary -->
		<?php endif; ?> 
    </div>
</div> 


