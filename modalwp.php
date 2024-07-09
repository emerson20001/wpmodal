<?php
/**
 * Plugin Name: ModalWP
 * Description: Plugin para cadastro e exibição de uma imagem como modal no frontend.
 * Version: 1.1.0
 * Author: Emerson
 * Text Domain: modalwp
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'classes/ModalWP.php';

function run_modalwp() {
    $plugin = new ModalWP();
    $plugin->run();
}
run_modalwp();
