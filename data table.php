<?php
/**
 * Plugin Name: Data table
 * Plugin URI:  Plugin URL Link
 * Author:      Plugin Author Name
 * Author URI:  Plugin Author Link
 * Description: This plugin makes for practice which is "popup".
 * Version:     0.1.0
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: dtb
 */
if(!class_exists("WP_List_Table")){
    // require_once("ABSPATH"."wp-admin/includes/class-wp-list-table.php");
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';

}
require_once "calss_person_table.php";
function plugin_file_function() {
    load_plugin_textdomain('dtb', false, dirname(plugin_basename(__FILE__)) . '/lng');
}
add_action('plugins_loaded', 'plugin_file_function');

function database_admin_page(){
    add_menu_page(
        __('Data Table','dtb'),
        __( 'Data Table','dtb'),
        'manage_options',
        'datatable',
        'datatable_dipalay_table'        
    );
}


function datatable_dipalay_table(){
    include_once "data.php";
    $table = new Persons_Table();
    $table -> set_data($data);
    $table-> prepare_items();
    ?>
    <div class="wrap">
        <h2><?php _e("Persons","tabledata"); ?></h2>
        <form method="GET">
            <?php
             $table-> search_box('search','search_id');
             $table-> display();
            ?>

        </form>
    </div>
    <?php
    // $table-> search_box('search','search_id');
    // $table-> display();
}

add_action('admin_menu','database_admin_page');

?>