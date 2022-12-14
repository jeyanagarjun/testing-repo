<div class="d-flex col-md-6">
<?php if ( has_post_thumbnail() ) : ?>
    <figure class="avatar-md mr-3 mb-0">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('', array('class' => 'img-fluid r-3')); ?></a>
    </figure>
<?php endif ;?>
<div>
    <h6 class="track-title"><?php the_title(); ?></h6>
    <?php get_template_part( 'templates/user/dashboard/common/status');  ?>
</div>
</div>