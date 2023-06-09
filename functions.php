<?php

// settings pages
include 'functions/variables_page.php';

// cpt
include 'functions/cpt/cpt_slides.php';
include 'functions/cpt/cpt_piscinas.php';

// menus
function register_theme_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => 'Menu Principal',
        )
    );
}

add_action('after_setup_theme', 'register_theme_menus');