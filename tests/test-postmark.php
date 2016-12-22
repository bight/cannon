<?php
namespace PacketBoat\Tests;

use PacketBoat\Postmark\Postmark;

/**
 * Class PostmarkTest
 *
 * @package Packetboat
 */
class PostmarkTest extends \WP_UnitTestCase
{

    /**
     * @covers \PacketBoat\Postmark\Postmark::mailer
     */
    public function testMailer()
    {
        define('POSTMARK_SENDER_ADDRESS', 'foo@bar.com');
        define('POSTMARK_API_KEY', 'POSTMARK_API_TEST');

        // Test with valid API key.
        $result = wp_mail('foo@bar.com', 'Test Message', 'Test message body.');
        $this->assertTrue($result);
    }
}
