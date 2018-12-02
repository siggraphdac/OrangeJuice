<?php get_header(); ?>

<div id="primary">
<main id="single">

<!-- START the Loop. -->
<?php while ( have_posts() ) : the_post(); ?>

    <h3 id="post-title"><?php the_title(); ?></h3>

    <?php the_content(); ?>

<?php endwhile;?>
<!-- END the Loop. -->

</main>
</div> <!-- #primary -->

<?php get_footer(); ?>
