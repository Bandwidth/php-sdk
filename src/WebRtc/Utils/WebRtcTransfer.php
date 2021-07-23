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
        return '<?xml version="1.0" encoding="UTF-8"?><Response>' . WebRtcTransfer::generateTransferBxmlVerb($deviceToken, $voiceCallId, $sipUri) . '</Response>';
    }

    public static function generateTransferBxmlVerb($deviceToken, $voiceCallId, $sipUri = "sip:sipx.webrtc.bandwidth.com:5060") {
        $formattedCallId = substr(str_replace("-", "", $voiceCallId), 1);
        return '<Transfer><SipUri uui="' . $formattedCallId . ';encoding=base64' . $deviceToken . ';encoding=jwt">' . $sipUri . '</SipUri></Transfer>'; 
    }
}
