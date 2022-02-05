<?php get_header() ?>
<div class="homeBody"></div>
<div class="homeOverlay">
    <img src="<?= get_template_directory_uri() . '/assets/images/logo-CRUEL.svg' ?>" alt="">
    <h2>Actors with an attitude</h2>
</div>
<div class="homeContainer container" data-barba-namespace="home">
    <div class="homePanel row">

        <?php $actors = new WP_Query(array('post_type' => 'Talents', 'posts_per_page' => '4')); ?>
        <?php while ($actors->have_posts()) : $actors->the_post(); ?>
            <?php if (get_post_meta(get_the_ID(), '_talent_promote', true)) : ?>
                <div class="actor">
                    <div class="overlay">
                        <div class="actorInfos">
                            <h3><?= the_title() ?></h3>
                            <a href="<?= the_permalink() ?>">
                                View profil
                                <img src="<?= get_template_directory_uri() . '/assets/images/icons/select.svg' ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <img class="actorThumbnail" src="<?= the_post_thumbnail_url() ?>" alt="">
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</div>
</div>
<?php get_footer() ?>