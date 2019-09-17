<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package U3A_TOWNSVILLE
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php
        if ( has_post_thumbnail() ) { ?>
        <figure class="featured-image index-image">
	<?php u3a_townsville_post_thumbnail(); ?>
        </figure>
        <?php } ?>
    <div class="post__content">
	<header class="entry-header">
            <?php u3a_townsville_category_list(); ?>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				u3a_townsville_posted_on();
				u3a_townsville_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php u3a_townsville_post_thumbnail(); ?>

	<div class="entry-content">
            <?php
            $length_setting = get_theme_mod('length_setting');
            if ( 'excerpt' === $length_setting ) {
                the_excerpt();
                
            } else {
                the_content();
            }
            ?>
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'u3a-townsville' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'u3a-townsville' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

        
    </div><!-- .post__content -->
</article><!-- #post-<?php the_ID(); ?> -->
