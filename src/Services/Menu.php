<?php

namespace Leitsch\GafferTape\Services;

class Menu implements Service {

    public function register(): void
    {
        add_action('admin_menu', [$this, 'removeMenuPages'], 999);
        add_action('admin_menu', [$this, 'moveMenuPages'], 999);
    }

    public function removeMenuPages() {
        remove_menu_page('limit-login-attempts');
    }

    public function moveMenuPages() {
        // WP-Telegram
        remove_menu_page('wptelegram');
        add_submenu_page('tools.php','WP-Telegram', 'WP-Telegram','manage_options', 'wptelegram' );
    }
}
