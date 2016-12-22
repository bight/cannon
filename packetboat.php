<?php
/**
 * Plugin Name:     Packet Boat
 * Plugin URI:      https://github.com/bight/packetboat
 * Description:     A service-agnostic vehicle for WordPress transactional email
 * Author:          Ned Zimmerman
 * Author URI:      https://bight.ca
 * Text Domain:     packetboat
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         PacketBoat
 */

require_once('vendor/autoload.php');

if (! function_exists('wp_mail')) {
    if (defined('POSTMARK_API_KEY') && defined('POSTMARK_SENDER_ADDRESS')) {
        function wp_mail($to, $subject, $message, $headers = '', $attachments = [])
        {
            return \PacketBoat\Postmark\dispatch($to, $subject, $message, $headers, $attachments);
        }
    }
}
