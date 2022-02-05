<?php get_header() ?>
<div class="aboutBody"></div>
<div class="row aboutus" data-barba-namespace="about-us">
    <div class="col-12 col-md-12 col-lg-8 content">
        <div class="textcontainer">
            <div class="text">
                <h1 class="title"><?= the_title() ?></h1>
                <p class="little">
                    <?= the_content() ?>
                </p>
            </div>
            <a href="index.php/contact-us">
                <button class="contact">
                    Contact us
                    <span class="anim">
                        <img src="<?= get_template_directory_uri() . '/assets/images/icons/select.svg' ?>" alt="">
                    </span>
                </button>
            </a>

        </div>
    </div>

    <div class="col-12 col-md-12 col-lg-4 citation">
        <blockquote>
            <q><?= get_post_meta(get_the_ID(), '_about_citation', true) ?></q>
            <p><?= get_post_meta(get_the_ID(), '_about_author_citation', true) ?></p>
        </blockquote>
    </div>
</div>
<?php get_footer() ?>