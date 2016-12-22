<?php
/**
 * Class PostmarkTest
 *
 * @package Packetboat
 */

namespace PacketBoat;

/**
 * Test Postmark mailer.
 */
class PostmarkTest extends WP_UnitTestCase
{

    /**
     * @covers \PacketBoat\Postmark\PostMark::mailer
     */
    public function testMailer()
    {
        define('POSTMARK_SENDER_ADDRESS', 'foo@bar.com');

        // Test with missing API key.
        $result = wp_mail('foo@bar.com', 'Test Message', 'Test message body.');
        $this->assertEquals(false, $result);

        define('POSTMARK_API_KEY', 'POSTMARK_API_TEST');

        // Test with valid API key.
        $result = wp_mail('foo@bar.com', 'Test Message', 'Test message body.');
        $this->assertTrue($result);
    }
}
