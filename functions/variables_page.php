<?php

add_action('admin_menu', 'my_variables_page_settings_menu');

function my_variables_page_settings_menu()
{

  //create new top-level menu
  add_menu_page(
    'My Cool Plugin Settings',
    'Variáveis',
    'administrator',
    __FILE__,
    'my_variables_settings_page',
    'dashicons-admin-generic',
    plugins_url('/images/icon.png', __FILE__)
  );

  //call register settings function
  add_action('admin_init', 'register_my_variables_page_settings');
}


function register_my_variables_page_settings()
{
  //register our settings
  register_setting('my-variables-page-settings-group', 'home_page_id');
}

function my_variables_settings_page()
{
  ?>
  <div class="wrap">
    <form method="post" action="options.php">
      <?php settings_fields('my-variables-page-settings-group'); ?>
      <?php do_settings_sections('my-variables-page-settings-group'); ?>
      <?php wp_nonce_field('my_variables_settings', 'my_variables_settings_nonce'); ?>
      <table class="form-table">
        <h1>Variáveis de ambiente</h1>

        <tr valign="top">
          <th scope="row">
            <?php esc_html_e('Home page ID'); ?>
          </th>
          <td><input type="text" name="home_page_id" placeholder="" value="<?php echo esc_attr(get_option('home_page_id')); ?>" /></td>
        </tr>
      </table>

      <?php submit_button(); ?>
    </form>
  </div>
<?php } ?>