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
        $expected = '<?xml version="1.0" encoding="UTF-8"?><Response><Transfer><SipUri uui="asdf;encoding=jwt">sip:sipx.webrtc.bandwidth.com:5060</SipUri></Transfer></Response>';
        $actual = BandwidthLib\WebRtc\Utils\WebRtcTransfer::generateBxml('asdf');
        $this->assertEquals($expected, $actual);
    }

    public function testGenerateTransferBxmlVerb() {
        $expected = '<Transfer><SipUri uui="asdf;encoding=jwt">sip:sipx.webrtc.bandwidth.com:5060</SipUri></Transfer>';
        $actual = BandwidthLib\WebRtc\Utils\WebRtcTransfer::generateTransferBxmlVerb('asdf');
        $this->assertEquals($expected, $actual);
    }
}
