<?php
/**
 * Manteca
 * PHP version 8.1
 *
 * @package  Bandwidth
 */

namespace Bandwidth\Test\Utils;

use GuzzleHttp\Client;

/**
 * Shared helper for driving Manteca's test harness API during voice test suites.
 */
class Manteca
{
    /**
     * Create a Manteca test and return its ID.
     *
     * @param string $os       Operating system running the test
     * @param string $language Language/version label for the test
     * @param string $type     Manteca test type (e.g. "conference", "CALL")
     *
     * @return string The Manteca test ID
     */
    public static function createTest(string $os, string $language, string $type): string
    {
        $base_url = getenv("MANTECA_BASE_URL");

        $response = (new Client())->post("{$base_url}/tests", [
            'json' => [
                'os' => $os,
                'language' => $language,
                'type' => $type,
            ],
            'http_errors' => false,
        ]);

        if ($response->getStatusCode() >= 300) {
            throw new \RuntimeException(
                "Failed to create Manteca test: [{$response->getStatusCode()}] " . (string) $response->getBody()
            );
        }

        return (string) $response->getBody();
    }

    /**
     * Fetch the status of a Manteca test.
     *
     * @param string $testId The Manteca test ID
     *
     * @return array Decoded status body (e.g. callRecorded, callTranscribed)
     */
    public static function getStatus(string $testId): array
    {
        $base_url = getenv("MANTECA_BASE_URL");

        $response = (new Client())->get("{$base_url}/tests/{$testId}", [
            'http_errors' => false,
        ]);

        if ($response->getStatusCode() >= 300) {
            throw new \RuntimeException(
                "Failed to get Manteca test status: [{$response->getStatusCode()}] " . (string) $response->getBody()
            );
        }

        return json_decode((string) $response->getBody(), true);
    }
}
