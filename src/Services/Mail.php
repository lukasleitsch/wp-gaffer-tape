<?php

namespace Leitsch\GafferTape\Services;

use PHPMailer\PHPMailer\PHPMailer;

class Mail implements Service
{

    public function register(): void
    {
        add_action('phpmailer_init', [$this, 'setupSmtpConfig']);
    }

    public function setupSmtpConfig(PHPMailer $phpmailer)
    {
        if ( ! defined('SMTP_HOST')) {
            return;
        }

        $phpmailer->isSMTP();
        $phpmailer->Host = SMTP_HOST;

        if (defined('SMTP_USERNAME') && defined('SMTP_PASSWORD')) {
            $phpmailer->SMTPAuth = true;
            $phpmailer->Username = SMTP_USERNAME;
            $phpmailer->Password = SMTP_PASSWORD;
            $phpmailer->SMTPSecure = 'tls';
            $phpmailer->Port = '587';
        }

        $phpmailer->setFrom(
            apply_filters('wp_mail_from', SMTP_USERNAME),
            get_bloginfo('name')
        );
    }
}
