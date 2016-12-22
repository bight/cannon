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
        define('POSTMARK_SENDER_ADDRESS', 'foo@bar.com');
        define('POSTMARK_API_KEY', 'POSTMARK_API_TEST');

        // Test with valid API key.
        $result = \PacketBoat\Postmark\dispatch('foo@bar.com', 'Test Message', 'Test message body.');
        $this->assertTrue($result);
    }
}
