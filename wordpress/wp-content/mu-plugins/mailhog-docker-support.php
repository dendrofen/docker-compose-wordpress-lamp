<?php

/**
 * Mailhog Docker Support
 *
 * @author            Dendrofen
 * @copyright         2022 Mark Kompanets
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Mailhog Docker Support
 * Plugin URI:        https://github.com/dendrofen/docker-compose-wordpress-lamp
 * Description:       Setup WordPress phpmailer settings to work with mailhog, running on localhost using docker
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mark Kompanets
 * Author URI:        https://github.com/dendrofen
 * Text Domain:       mailhog-docker-support
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://github.com/dendrofen/docker-compose-wordpress-lamp
 */

class MailhogDockerSupport
{
    public function __construct()
    {
        add_action('phpmailer_init', [$this, 'mailer'], 10, 1);
        add_filter('wp_mail_from', [$this, 'from'], 10, 1);
        add_filter('wp_mail_from_name', [$this, 'from'], 10, 1);
    }
    public function mailer($phpmailer)
    {
        $phpmailer->isSMTP();

        $phpmailer->SMTPAuth = false;
        $phpmailer->SMTPSecure = '';
        $phpmailer->SMTPAutoTLS = false;
        $phpmailer->Host = 'mailhog';
        $phpmailer->Port = '1025';
        // $phpmailer->SMTPDebug = 2;
    }

    public function from()
    {
        return 'wordpress@localhost.app';
    }
}

new MailhogDockerSupport();
