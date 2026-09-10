<?php
/**
 * CallCleanup
 * PHP version 8.1
 *
 * @package  Bandwidth
 */

namespace Bandwidth\Test\Utils;

use Bandwidth\Api\CallsApi;
use Bandwidth\Model\CallStateEnum;
use Bandwidth\Model\UpdateCall;

/**
 * Shared helper for hanging up calls created during voice test suites.
 */
class CallCleanup
{
    private const TEST_SLEEP = 5;

    /**
     * Ensure that every call in the list has been hung up.
     *
     * @param CallsApi $api        Calls API instance
     * @param string   $accountId  Bandwidth account ID
     * @param string[] $callIdList List of Bandwidth call IDs
     */
    public static function cleanup(CallsApi $api, string $accountId, array $callIdList): void
    {
        sleep(self::TEST_SLEEP);

        foreach ($callIdList as $callId) {
            [$call_state] = $api->getCallStateWithHttpInfo($accountId, $callId);
            if (strcasecmp($call_state->getState(), 'disconnected') !== 0) {
                $api->updateCallWithHttpInfo(
                    $accountId,
                    $callId,
                    new UpdateCall(['state' => CallStateEnum::COMPLETED])
                );
            }
        }
    }
}
