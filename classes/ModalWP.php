<?php

class ModalWP {
    
    public function __construct() {
        require_once plugin_dir_path( __FILE__ ) . 'Admin.php';
        $this->admin = new ModalWP_Admin();
    }

    public function run() {
        add_action( 'customize_register', array( $this->admin, 'register_customizer_settings' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_action( 'wp_footer', array( $this, 'enqueue_scripts' ) );
        add_action( 'wp_footer', array( $this, 'display_modal' ) );
    }

    public function enqueue_styles() {
        wp_enqueue_style( 'modalwp-css', plugin_dir_url( __FILE__ ) . '../assets/css/modal.css', array(), '1.0.0' );
    }

    public function enqueue_scripts() {
        wp_enqueue_script( 'modalwp-js', plugin_dir_url( __FILE__ ) . '../assets/js/modal.js', array(), '1.0.0', true );
        wp_localize_script( 'modalwp-js', 'modalwp_settings', array(
            'close_time' => get_theme_mod( 'modalwp_close_time', 0 ),
            'expiry_date' => get_theme_mod( 'modalwp_expiry_date', '' ),
            'link_url' => get_theme_mod( 'modalwp_link_url', '' ),
            'delay_time' => 2000 // 2 segundos
        ));
    }

    public function display_modal() {
        if ( ! $this->is_home_page() ) {
            return;
        }

        $image_url = get_theme_mod( 'modalwp_image' );
        $modal_active = get_theme_mod( 'modalwp_active' );
        $expiry_date = get_theme_mod( 'modalwp_expiry_date' );
        $link_url = get_theme_mod( 'modalwp_link_url', '' );

        if ( $modal_active && $image_url && $this->is_modal_active($expiry_date) ) {
            echo '<div id="modalwp-modal" class="modalwp-modal">
                    <div class="modalwp-modal-content">
                        <span class="modalwp-close">&times;</span>
                        <a href="' . esc_url( $link_url ) . '" target="_blank">
                            <img src="' . esc_url( $image_url ) . '" alt="Modal Image" />
                        </a>
                    </div>
                  </div>';
        }
    }

    private function is_modal_active($expiry_date) {
        if (empty($expiry_date)) {
            return true;
        }

        $current_date = new DateTime();
        $expiry_date = new DateTime($expiry_date);

        return $current_date <= $expiry_date;
    }

    private function is_home_page() {
        return is_front_page() || is_home();
    }
}
