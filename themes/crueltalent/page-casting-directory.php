<?php get_header() ?>
<div class="subBody"></div>
<div class="directoryPage" data-barba-namespace='casting-directory'>
    <div class="row">
        <div class="col col-12">
            <h2><?= the_title() ?></h2>
        </div>
        <div class="col col-12 gridBar">
            <p>
                <?= the_content() ?>
            </p>
            <div class="gridButtons">
                <form action="">
                    <a class="byFour">
                        <img src="<?= get_template_directory_uri() . '/assets/images/icons/icon-thumbs.svg' ?>" alt="">
                    </a>
                    <a class="byTwo">
                        <img src="<?= get_template_directory_uri() . '/assets/images/icons/icon-poster.svg' ?>" alt="">
                    </a>

                    <input class="searchBar" type="search" placeholder="Search a profil" name="" id="">
                    <button type="submit" class="searchBarButton">
                        <img src="<?= get_template_directory_uri() . '/assets/images/icons/search.svg' ?>" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row grid">
        <?php $casting = new WP_Query(array('post_type' => 'Talents')) ?>
        <?php while ($casting->have_posts()) : $casting->the_post(); ?>
                <div class="actorThumbnail col-6">
                    <div class="card">
                        <img src="<?= the_post_thumbnail_url() ?>" alt="" class=" box card-img">
                        <a href="<?= the_permalink() ?>">
                            <div class="card-img-overlay castingOverlay">
                                <div class="actorName">
                                    <h3><?= the_title() ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        <?php endwhile ?>

        <div class="actorThumbnail col-6">
            <div class="card">
                <a href="index.php/contact-us">
                    <img src="<?= get_template_directory_uri() . '/assets/images/actors/last.png' ?>" alt="" class="box card-img">
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>