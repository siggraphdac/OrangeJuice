<?php get_header(); ?>

<div id="primary">
<main id="single">

<!-- START the Loop. -->
<?php while ( have_posts() ) : the_post(); ?>

    <h3 id="post-title"><?php the_title(); ?></h3>
    
    <?php if (strpos(get_the_content(), '<h4>') == false) : ?> 
        <h4 id="post-author"><?php the_author_link(); ?></h4>
    <?php endif; ?>

    <?php if (strpos(get_the_content(), 'Images') == false && get_post_gallery() == true ) : ?> 
        <h5 id="gallery-heading">Images</h5>
    <?php endif; ?>

    <div id="image-gallery">
        <?php $galleries = get_post_galleries_images( $post ); ?> 
    
        <?php if ( get_post_gallery() ) : 
            $gallery = get_post_gallery( get_the_ID(), false );
            $gids = explode(",", $gallery['ids']);
            $i = 0;
            console_log($gallery);
            foreach( $gallery['src'] as $src ) : 
        ?>

        <a href="#gallery-image-<?php echo $gids[$i];?>"> 
            <img src="<?php echo $src; ?>" class="gallery-image" />
        </a> 

        <a href="#close-<?php echo $gids[$i];?>"> 
            <span class="gallery-image-large-span" id="close-<?php echo $gids[$i];?>">
                <img src="<?php echo wp_get_attachment_image_src($gids[$i], "large")[0];?>" class="gallery-image-large" id="gallery-image-<?php echo $gids[$i];?>"/>
            </span>
        </a>

            <?php $i++; endforeach; endif; ?>
    </div>
    
    <?php if (strpos(get_the_content(), 'Artist Statement') == false) : ?> 
        <h5 id="description-heading">Artist Statement</h5>
    <?php endif; ?>
    
    <?php echo apply_filters('the_content',strip_shortcodes(get_the_content())); ?>
    
    <?php if (strpos(get_the_content(), 'Artist Bio') == false) : ?> 
        <h5 id="bio-heading">Artist Bio</h5>    
        <div id="author-description"><?php the_author_meta('description'); ?></div>
    <?php endif; ?>

<?php endwhile;?>
<!-- END the Loop. -->

</main>
</div> <!-- #primary -->

<?php get_footer(); ?>
