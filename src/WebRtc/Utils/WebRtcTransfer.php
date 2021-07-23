<?php
/**
 * WebRtcTransfer.php
 *
 * Custom transfer BXML for WebRtc
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\WebRtc\Utils;

class WebRtcTransfer {
    public static function generateBxml($deviceToken, $voiceCallId, $sipUri = "sip:sipx.webrtc.bandwidth.com:5060") {
        /**
        * Returns BXML string with WebRTC a device token to perform a SIP transfer
        * @param    string  $deviceToken  The device token
        * @param    array   $voiceCallId  The Bandwidth Voice Call Id
        * @return   string  $sipUri The SIP URI to transfer the call to 
        */
        return '<?xml version="1.0" encoding="UTF-8"?><Response>' . WebRtcTransfer::generateTransferBxmlVerb($deviceToken, $voiceCallId, $sipUri) . '</Response>';
    }

    public static function generateTransferBxmlVerb($deviceToken, $voiceCallId, $sipUri = "sip:sipx.webrtc.bandwidth.com:5060") {
        /**
        * Returns the Transfer verb to perform the SIP transfer
        * @param    string  $deviceToken  The device token
        * @param    array   $voiceCallId  The Bandwidth Voice Call Id
        * @return   string  $sipUri The SIP URI to transfer the call to 
        */
        $formattedCallId = substr(str_replace("-", "", $voiceCallId), 1);
        return '<Transfer><SipUri uui="' . $formattedCallId . ';encoding=base64' . $deviceToken . ';encoding=jwt">' . $sipUri . '</SipUri></Transfer>'; 
    }
}
