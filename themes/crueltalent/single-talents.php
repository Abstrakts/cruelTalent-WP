<?php get_header() ?>
<div class="singleBody"></div>
<div aria-labelledby="modal-1-label" class="modal fade modal-media modal-video modal-slim modal-1" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></div>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9"><iframe allowfullscreen="" frameborder="0" src="" width="100%"></iframe></div>
            </div>
        </div>
    </div>
</div>

<div class="container supercontent" data-barba-namespace="single-talents" data-barba-namespace="single-talents-next">

    <div class="row actorDetails">

        <?php
        $arrow = '<img class="arrow" src="' . get_template_directory_uri() . '/assets/images/icons/select.svg" alt=""/>';
        ?>

        <div class="col-12 col-md-12 col-lg-6 actorImg">
            <?php previous_post_link('%link', $arrow) ?>
            <img src="<?= the_post_thumbnail_url() ?>" alt="actor" class="actorImage">

            <?php next_post_link('%link', $arrow) ?>

        </div>

        <div class="col-12 col-md-12 col-lg-6 details">
            <div class="block">
                <h1><?= the_title() ?></h1>

                <p>
                    <?= the_content() ?>
                </p>

                <div class="videoclip">
                    <div class="box video" data-target=".modal-1" data-toggle="modal" data-the-video="<?= get_post_meta(get_the_ID(), '_talent_video', true) ?>">
                        <img src="<?= get_template_directory_uri() . '/assets/images/icons/social/youtube.svg' ?>" alt="youtube">
                        <p>See Video Showrel</p>
                    </div>

                    <div class="box clip">
                        <audio id="myAudio">
                            <?php $upload_dir = wp_upload_dir() ?>
                            <source src="<?= $upload_dir['baseurl'] . '/' . get_post_meta(get_the_ID(), '_talent_audio', true) ?>">
                        </audio>
                        <img src="<?= get_template_directory_uri() . '/assets/images/icons/volume.svg' ?>" alt="volume">
                        <p>Listen to Voice Clips</p>
                    </div>
                </div>

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Eye colour</th>
                            <td><?= get_post_meta(get_the_ID(), '_talent_eye_color', true) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Height</th>
                            <td><?= get_post_meta(get_the_ID(), '_talent_height', true) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Playing age</th>
                            <td><?= get_post_meta(get_the_ID(), '_talent_playing_ages', true) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Mother tongue</th>
                            <td><?= get_post_meta(get_the_ID(), '_talent_mother_tongue', true) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Languages spoken</th>
                            <td><?= get_post_meta(get_the_ID(), '_talent_languages', true) ?></td>
                        </tr>
                    </tbody>
                </table>

                <div class="enquire">
                    <p>Book or Enquire</p>

                    <a href="index.php/contact-us">
                        <button class="send">
                            Contact us
                            <span class="anim">
                                <img src="<?= get_template_directory_uri() . '/assets/images/icons/select.svg' ?>" alt="">
                            </span>
                        </button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>