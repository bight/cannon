<?php
/**
 * Plugin Name:     Packet Boat
 * Plugin URI:      https://github.com/bight/packetboat
 * Description:     A service-agnostic vehicle for WordPress transactional email
 * Author:          Ned Zimmerman
 * Author URI:      https://bight.ca
 * Version:         1.0.0
 * GitHub Plugin URI: https://github.com/bight/packetboat
 * Release Asset: true

 * @package         PacketBoat
 */

if (!defined('POSTMARK_SERVER_TOKEN') && defined('POSTMARK_API_KEY')) {
    define('POSTMARK_SERVER_TOKEN', POSTMARK_API_KEY);
}

if (!defined('POSTMARK_SENDER_SIGNATURE') && defined('POSTMARK_SENDER_ADDRESS')) {
    define('POSTMARK_SENDER_SIGNATURE', POSTMARK_SENDER_ADDRESS);
}

require_once('vendor/autoload.php');

if (! function_exists('wp_mail')) {
    if (defined('POSTMARK_SERVER_TOKEN') && defined('POSTMARK_SENDER_SIGNATURE')) {
        function wp_mail($to, $subject, $message, $headers = '', $attachments = [])
        {
            return \PacketBoat\Postmark\dispatch($to, $subject, $message, $headers, $attachments);
        }
    }
}
