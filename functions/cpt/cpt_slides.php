<?php

function create_custom_post_type_slides()
{
  $labels = array(
    'name' => 'Slides',
    'singular_name' => 'Slide',
    'add_new' => 'Adicionar Novo',
    'add_new_item' => 'Adicionar Novo Slide',
    'edit_item' => 'Editar Slide',
    'new_item' => 'Novo Slide',
    'view_item' => 'Visualizar Slide',
    'search_items' => 'Pesquisar Slides',
    'not_found' => 'Nenhum slide encontrado',
    'not_found_in_trash' => 'Nenhum slide encontrado na lixeira',
    'parent_item_colon' => '',
    'menu_name' => 'Slides'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-images-alt2',
    // Ícone do menu (opcional)
    'supports' => array('title', 'thumbnail'),
    // Recursos suportados
    'has_archive' => true,
    // Habilitar arquivo de slug
    'rewrite' => array('slug' => 'slides'), // Slug personalizado para os permalinks
  );

  register_post_type('slides', $args);
}
add_action('init', 'create_custom_post_type_slides');