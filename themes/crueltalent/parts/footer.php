<div class=" footerContainer container">
    <div class="footer">
        <div class="row">
            <div class="col col-12 col-sm-12 col-lg-6">
                <p>© 2020 CRUEL Talent Management. Legals Mentions | Privacy Policy</p>
            </div>
            <div class="col col-12 col-sm-12 col-lg-3">
                <div class="toTop">
                    <img src="<?= get_template_directory_uri() . '/assets/images/icons/select.svg' ?>" alt="">
                </div>
            </div>
            <div class="col col-12 col-sm-12 col-lg-3">
                <ul>
                    <?php
                    $menu_item = wp_get_nav_menu_items('footer');
                    foreach ($menu_item as $menu) {
                    ?>
                        <li>
                            <a href="<?= $menu->url ?>">
                                <img src="<?= get_template_directory_uri() . '/assets/images/icons/social/' . $menu->title . '.svg' ?>" alt="facebook">
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>