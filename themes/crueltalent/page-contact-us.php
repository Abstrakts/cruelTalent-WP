<?php require('header.php') ?>

<div class="contactBody"></div>
<div class="formularyBg"></div>
<div class="row contactus" data-barba-namespace="contact-us">
    <div class="col-12 col-md-6 col-lg-4 content">
        <div class="text">
            <h1 class="title"><?= the_title() ?></h1>
            <p>
                <?= the_content() ?>
            </p>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-1 space"></div>

    <div class="col-12 col-md-6 col-lg-7 formulary">
        <h1>Lorem ipsum dolor sit amet</h1>

        <?= do_shortcode('[contact-form-7 id="58" title="contact-us"]') ?>

    </div>
</div>
<?php require('footer.php') ?>