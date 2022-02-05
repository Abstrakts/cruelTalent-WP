<div class="navbar navbar-dark box-shadow">
    <div class="container d-flex justify-content-between">
        <a href="<?= get_home_url() ?>" class="navbar-brand d-flex align-items-center">
            <img class="navbarLogo" src="<?= get_template_directory_uri() . '/assets/images/logo-CRUEL-txt-white.svg' ?>" alt="">
        </a>
        <a class="nav-button ml-auto mr-4"><span id="nav-icon3"><span></span><span></span><span></span><span></span></span></a>
        <?php
        wp_nav_menu([
            'theme_location' => 'navbar',
            'container' => 'false',
            'menu_class' => 'nav-desktop'
        ])
        ?>
    </div>
</div>
<!--navbar end-->

<div class="fixed-top main-menu">
    <div class="flex-center p-5">
        <?php
        wp_nav_menu([
            'theme_location' => 'mobile',
            'container' => 'false',
            'menu_class' => 'nav flex-column'
        ])
        ?>
        
    </div>
</div>