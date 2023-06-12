<?php
$theme = get_bloginfo("template_url");
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#3655B3">
  <title>
    <?php wp_title(); ?>
  </title>
  <!--Fonte-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!--CSS-->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?= $theme; ?>/dist/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= $theme; ?>/dist/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= $theme; ?>/dist/css/style.css">
  <link rel="stylesheet" href="<?= $theme; ?>/style-update.css">
  <link rel="stylesheet" href="<?= $theme; ?>/style.css">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="bg-yellow">
    <nav id="main-menu" class="navbar navbar-expand-lg navbar-dark py-0">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="<?= $theme; ?>/dist/img/logo-acquafiber.png" class="img-fluid" alt="logo acquafiber">
        </a>

        <!--Links do whatsapp e instagram no mobile-->
        <div class="d-lg-none ms-auto px-4 gap-3 justify-content-end social-media">
          <a href="<?= get_field('whatsapp_link', get_option('home_page_id')); ?>" target="_blank">
            <img width="25" src="<?= $theme; ?>/dist/img/svg/whatsapp.svg" alt="whatsapp">
          </a>
          <a href="<?= get_field('instagram_link', get_option('home_page_id')); ?>" target="_blank">
            <img width="25" src="<?= $theme; ?>/dist/img/svg/instagram.svg" alt="instagram">
          </a>
        </div>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <div id="menu-toggler"></div>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <ul class="navbar-nav gap-3 text-uppercase fz-16 ff-open-sans align-items-center fw-semi-bold">
            <!--Links do whatsapp e instagram no desktop-->
            <li class="nav-item d-none d-lg-flex gap-1">
              <a class="nav-link" href="https://api.whatsapp.com/send?phone=5584999455686">
                <img src="<?= $theme; ?>/dist/img/svg/whatsapp.svg" alt="whatsapp">
              </a>
              <a class="nav-link" href="<?= get_field('instagram_link', get_option('home_page_id')); ?>" target="_blank">
                <img src="<?= $theme; ?>/dist/img/svg/instagram.svg" alt="instagram">
              </a>
            </li>
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'primary-menu',
                'items_wrap' => '%3$s',
                // Remove o contêiner <ul>
                'container' => false,
                // Remove o contêiner <nav>
                'menu_class' => 'primary-menu',
                'item_class' => 'nav-item',
                'link_class' => 'nav-item',
              )
            );
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>