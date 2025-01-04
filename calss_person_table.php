<?php
if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}
class Persons_Table extends WP_List_Table {

    function __construct($args = array()) {
        parent::__construct($args); 
    }

    function set_data($data) {
        $this->items = $data;
    }
    function get_columns() {
        return [
            'cb'   => '<input type="checkbox">',
            'name' => __('Name', 'tabledata'),
            'email' => __('E-mail', 'tabledata'),
            'age'  => __('Age', 'tabledata')
        ];
    }
    function prepare_items() {
        $this->_column_headers = array($this->get_columns());
    }
    function column_default($item, $column_name) {
        return isset($item[$column_name]) ? $item[$column_name] : '';
    }


    function column_cb($item) {
        return sprintf('<input type="checkbox" name="person[]" value="%s">', $item['id']);
    }
}
?>
