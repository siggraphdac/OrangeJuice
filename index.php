<?php get_header(); ?>

<div id="primary">
<main id="index">
<?php

foreach (get_pages() as $page) {
    echo '<div class="nav-item page-item"> <a href="' . get_page_link( $page->ID ) . '">' . $page->post_title . '</a> </div>';
}

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="nav-item post-item">
            <a href="<?php the_permalink(); ?>">
                <div class="post-item-title"><?php the_title(); ?></div>
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'thumbnail' );
                } ?>
            </a>
            </div>

<?php endwhile; endif; ?>

</main>
</div><!-- #primary -->

<?php get_footer(); ?>