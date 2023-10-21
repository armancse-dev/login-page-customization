<?php
/**
 * Plugin Name:       Login Page Customization
 * Plugin URI:        https://wordpress.org/plugins/login-page-customization/
 * Description:       Login Page Customization in WordPress (WP) plugins is a powerful way to tailor  the appearance and functionality of your WP site's login page according to your unique requirements. With these plugins, you can make the login process more user-friendly, nice & beautiful design.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Arman Hossain
 * Author URI:        https://armandev.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       lgcw
 */

 /**
  * Function for Plugin page option
  */

  function lgcw_theme_page_added(){
    add_menu_page( 'Admin Login Option', 'WP Login Opt.', 'manage_options', 'lgcw-plugin-option', 'lgcw_page_create', 'dashicons-unlock', 101 );
  }

  add_action( 'admin_menu', 'lgcw_theme_page_added' );


  /*
  * Style for Plugin Options
  */
  function lgcw_admin_style_css(){
  wp_enqueue_style( 'lgcw_admin_style', plugins_url( 'css/lgcw_admin_style.css', __FILE__ ), false, "1.0.0");
  }

  add_action('admin_enqueue_scripts', 'lgcw_admin_style_css');

  /**
   * Callback plugin function
   */

  function lgcw_page_create(){
    ?>
      <div class="main_area_lgcw">
        <div class="body_area_lgcw lgcw_common">
          <h3 id="title"><?php echo esc_attr( 'Customization Login page' ); ?></h3>
          <form action="options.php" method="post">
            <?php wp_nonce_field( 'update-options' ); ?>
            <!-- Primary Color -->
            <label for="primary_color_lgcw" name="primary_color_lgcw"><?php echo esc_attr( 'Primary Color' ); ?></label>
            <input type="color" name="primary_color_lgcw" value="<?php print get_option( 'primary_color_lgcw' ); ?>">
            <!-- Main Logo -->
            <label for="logo_image_lgcw" name="logo_image_lgcw"><?php echo esc_attr( 'Upload Your Logo' ); ?></label>
            <input type="text" name="logo_image_lgcw" value="<?php print get_option( 'logo_image_lgcwe' ); ?>" placeholder="Paste your Logo URL here">

            <!-- Login page BG Image -->
            <label for="custom_bg_img_lgcw" name="custom_bg_img_lgcw"><?php print esc_attr( 'Upload your Bacground Image' ); ?></label>
            <input type="text" name="custom_bg_img_lgcw" value="<?php print get_option('custom_bg_img_lgcw') ?>" placeholder="Paste your Background Image URL here">

            <!-- Login page BG Brightness -->
            <label for="custom_brightness_bg_lgcw" name="custom_brightness_bg_lgcw"><?php print esc_attr( 'Bacground Brightness {Between 0.1 to 0.9}' ); ?></label>
            <input type="text" name="custom_brightness_bg_lgcw" value="<?php print get_option('custom_brightness_bg_lgcw') ?>" placeholder="Between 0.1 to 0.9">

            <input type="hidden" name="action" value="update" >
            <input type="hidden" name="page_options" value="primary_color_lgcw, logo_image_lgcw, custom_bg_img_lgcw, custom_brightness_bg_lgcw" >

            <input type="submit" name="submit" class="button button-primary" value="<?php _e('Save Changes', 'lgcw'); ?>">
          </form>
        </div>
        <div class="sidebar_area_lgcw lgcw_common">
          <h3 id="title"><?php print esc_attr( 'About Author' ); ?></h3>
          <p>I'm <strong><a href="https://armandev.com" target="_blank">Arman Hossain</a></strong> a Front End Web developer who is passionate about making error-free websites with 100% client satisfaction. I have a passion for learning and sharing my knowledge with others as publicly as possible. I love to solve real-world problems.</p>
        </div>
      </div>

    <?php
  }


   
// Loading CSS
function lgcw_register_login_enqueue(){
  wp_enqueue_style('lgcw_login_enqueue', plugins_url( 'css/lgcw-style.css', __FILE__ ), false, "1.0.0" );

}

add_action( 'login_enqueue_scripts', 'lgcw_register_login_enqueue');

// Changing Login form logo
function lgcw_login_page_logo_change(){
   ?>
   <style>
     #login h1 a, .login h1 a{
       background-image: url(<?php print plugin_dir_url(__FILE__). 'img/whatson_logo.png'; ?>);
     }
   </style>
 
   <?php
 }
 add_action( 'login_enqueue_scripts', 'lgcw_login_page_logo_change');
 
 // Changing Login form logo url
 function lgcw_url_change_for_login_logo_(){
   return home_url();
 }
 add_filter( 'login_headerurl', ' function lgcw_url_change_for_login_logo_(){
  ');


 ?>