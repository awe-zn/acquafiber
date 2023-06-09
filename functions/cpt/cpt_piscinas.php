<?php

function create_custom_post_type_piscinas()
{
  $labels = array(
    'name' => 'Piscinas',
    'singular_name' => 'Piscina',
    'add_new' => 'Adicionar Nova',
    'add_new_item' => 'Adicionar Nova Piscina',
    'edit_item' => 'Editar Piscina',
    'new_item' => 'Nova Piscina',
    'view_item' => 'Visualizar Piscina',
    'search_items' => 'Pesquisar Piscinas',
    'not_found' => 'Nenhuma piscina encontrada',
    'not_found_in_trash' => 'Nenhuma piscina encontrada na lixeira',
    'parent_item_colon' => '',
    'menu_name' => 'Piscinas'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-admin-post',
    // Ícone do menu (opcional)
    'supports' => array('title', 'editor', 'thumbnail'),
    // Recursos suportados
    'has_archive' => true,
    // Habilitar arquivo de slug
    'rewrite' => array('slug' => 'piscinas'), // Slug personalizado para os permalinks
  );

  register_post_type('piscinas', $args);
}
add_action('init', 'create_custom_post_type_piscinas');