<?php

$featured_post_ids = get_theme_mod( 'featured_ids' );
$featured_count = get_theme_mod( 'featured_count', 5 );

if( $featured_post_ids && $featured_post_ids[0]!= '' ) {
	$args = array( 'post_type' => array('post'), 'post__in' => $featured_post_ids, 'showposts' => $featured_count, 'orderby' => 'post__in', 'ignore_sticky_posts' => true );
} else {
	$args = array( 'post_type' => array('post'), 'showposts' => $featured_count, 'ignore_sticky_posts' => true );
}

$featured_query = new WP_Query( $args );

?>

<div class="col-12">
<?php if ( $featured_query->have_posts() ) : ?>
    <div id="wp-bp-posts-slider" class="carousel slide mt-3r rounded" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $post_counter = 0; ?>
            <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                <li data-target="#wp-bp-posts-slider" data-slide-to="<?php echo esc_attr( $post_counter ); ?>" class="<?php if ( $post_counter === 0 ) : echo "active"; endif; ?>"></li>
                <?php $post_counter++; ?>
            <?php endwhile; ?>
        </ol>
        <div class="carousel-inner rounded">
            <?php $post_counter = 0; ?>
            <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                <?php
                    $feat_image = get_template_directory_uri() . '/assets/images/default.jpg';
                    $feat_img_alt = '';
                    if( has_post_thumbnail() ) {
                        $get_feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $feat_image = $get_feat_image[0];
                        $feat_img_alt = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
                    }
                    if ( $feat_img_alt === '' ) {
                        $feat_img_alt = get_the_title();
                    }
                ?>

                <div class="carousel-item rounded <?php if ( $post_counter === 0 ) : echo "active"; endif; ?>">
                    <div class="half-post-entry d-block d-lg-flex bg-light">
                      <div class="img-bg" style="background-image: url(<?php echo esc_url( $feat_image ); ?>)"></div>
                      <div class="contents">
                        <span class="caption"><?php the_category( '</span> <span class="badge badge-light badge-pill">' ); ?></span>
                        
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

                        <p class="mb-3"><?php echo esc_html( wp_bootstrap_4_get_short_excerpt( 20 ) ); ?></p>
                        
                        <div class="post-meta">
                          <!-- <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span> -->
                          <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-sm"><?php esc_html_e( 'Read More', 'wp-bootstrap-4' ); ?> <small class="oi oi-chevron-right ml-1"></small></a>
                        </div>
                      </div>
                    </div>
                </div>

                <?php $post_counter++; ?>
            <?php endwhile; ?>
        </div>
        <a class="carousel-control-prev" href="#wp-bp-posts-slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"><?php esc_html_e( 'Previous', 'wp-bootstrap-4' ); ?></span>
        </a>
        <a class="carousel-control-next" href="#wp-bp-posts-slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"><?php esc_html_e( 'Next', 'wp-bootstrap-4' ); ?></span>
        </a>
    </div>
<?php endif; ?>

</div>