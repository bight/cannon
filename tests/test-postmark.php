<?php
namespace PacketBoat\Tests;

/**
 * Class PostmarkTest
 *
 * @package Packetboat
 */
class PostmarkTest extends \WP_UnitTestCase
{

    /**
     * @covers \PacketBoat\Postmark\dispatch
     */
    public function testDispatch()
    {
        define('POSTMARK_SERVER_TOKEN', 'POSTMARK_API_TEST');
        define('POSTMARK_SENDER_SIGNATURE', 'foo@bar.com');

        // Test with valid API key.
        $result = \PacketBoat\Postmark\dispatch('foo@bar.com', 'Test Message', 'Test message body.');
        $this->assertTrue($result);

        // Test with multiple recipients.
        $result = \PacketBoat\Postmark\dispatch(['foo@foo.com', 'bar@bar.com'], 'Test Message', 'Test message body.');
        $this->assertTrue($result);

        // Test with an attachment (from https://commons.wikimedia.org/wiki/File:18th-century_packet_boat_used_for_postal_service.jpg).
        $result = \PacketBoat\Postmark\dispatch('foo@bar.com', 'Test Message', 'Test message body.', '', [dirname(__FILE__) . '/data/packetboat.jpg']);
        $this->assertTrue($result);

        // Test with rich text email.
        $result = \PacketBoat\Postmark\dispatch('foo@bar.com', 'Test Message', '<em>Test message body.</em>', 'Content-Type: text/html;');
        $this->assertTrue($result);
    }
}
