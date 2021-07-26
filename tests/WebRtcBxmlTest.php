<?php

/**
 * WebRtcBxmlTest.php
 *
 * A simple php integration test class for WebRtc BXML
 *
 * @copyright Bandwidth INC
 */

use PHPUnit\Framework\TestCase;

final class WebRtcBxmlTest extends TestCase
{
    public function testGenerateBxml() {
        $expected = '<?xml version="1.0" encoding="UTF-8"?><Response><Transfer><SipUri uui="93d6f3c0be5845960b744fa28015d8ede84bd1a4;encoding=base64,asdf;encoding=jwt">sip:sipx.webrtc.bandwidth.com:5060</SipUri></Transfer></Response>';
        $actual = BandwidthLib\WebRtc\Utils\WebRtcTransfer::generateBxml('asdf', 'c-93d6f3c0-be584596-0b74-4fa2-8015-d8ede84bd1a4');
        $this->assertEquals($expected, $actual);
    }

    public function testGenerateTransferBxmlVerb() {
        $expected = '<Transfer><SipUri uui="93d6f3c0be5845960b744fa28015d8ede84bd1a4;encoding=base64,asdf;encoding=jwt">sip:sipx.webrtc.bandwidth.com:5060</SipUri></Transfer>';
        $actual = BandwidthLib\WebRtc\Utils\WebRtcTransfer::generateTransferBxmlVerb('asdf', 'c-93d6f3c0-be584596-0b74-4fa2-8015-d8ede84bd1a4');
        $this->assertEquals($expected, $actual);
    }
}
