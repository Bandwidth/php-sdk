<?php

use PHPUnit\Framework\TestCase;
use BandwidthLib\Voice\Controllers\EndpointsController;
use BandwidthLib\Voice\Models\CreateEndpointRequest;
use BandwidthLib\Voice\Models\Endpoint;
use BandwidthLib\Voice\Models\CreateEndpointResponse;

class EndpointsControllerTest extends TestCase
{
    private $apiClient;
    private $controller;
    private $accountId = 'test-account';

    protected function setUp(): void
    {
        // Mock API client with basic get/post/put/delete methods
        $this->apiClient = $this->createMock(stdClass::class);
        $this->controller = new EndpointsController($this->apiClient, $this->accountId);
    }

    public function testCreateEndpoint()
    {
        $request = new CreateEndpointRequest('WEBRTC', 'INBOUND', 'https://callback', null, 'tag1', ['meta' => 'data']);
        $responseData = [
            'endpointId' => 'ep-123',
            'type' => 'WEBRTC',
            'status' => 'ACTIVE',
            'createdTime' => '2026-03-11T00:00:00Z',
            'updatedTime' => '2026-03-11T00:00:00Z',
            'tag' => 'tag1',
            'devices' => [],
            'token' => 'tok-abc',
        ];
        $this->apiClient->expects($this->once())
            ->method('post')
            ->with("/accounts/{$this->accountId}/endpoints", $request)
            ->willReturn($responseData);
        $resp = $this->controller->createEndpoint($request);
        $this->assertInstanceOf(CreateEndpointResponse::class, $resp);
        $this->assertEquals('ep-123', $resp->endpointId);
        $this->assertEquals('WEBRTC', $resp->type);
        $this->assertEquals('ACTIVE', $resp->status);
    }

    public function testListEndpoints()
    {
        $responseData = [
            'endpoints' => [
                [
                    'id' => 'ep-1',
                    'type' => 'WEBRTC',
                    'status' => 'ACTIVE',
                    'direction' => 'INBOUND',
                    'eventCallbackUrl' => 'https://cb',
                    'eventFallbackUrl' => null,
                    'tag' => 'tag',
                    'devices' => [],
                    'createdTime' => '2026-03-11T00:00:00Z',
                    'updatedTime' => '2026-03-11T00:00:00Z',
                ]
            ]
        ];
        $this->apiClient->expects($this->once())
            ->method('get')
            ->with("/accounts/{$this->accountId}/endpoints", [])
            ->willReturn($responseData);
        $resp = $this->controller->listEndpoints();
        $this->assertIsArray($resp);
        $this->assertInstanceOf(Endpoint::class, $resp[0]);
        $this->assertEquals('ep-1', $resp[0]->id);
    }

    public function testGetEndpoint()
    {
        $endpointId = 'ep-1';
        $responseData = [
            'id' => $endpointId,
            'type' => 'WEBRTC',
            'status' => 'ACTIVE',
            'direction' => 'INBOUND',
            'eventCallbackUrl' => 'https://cb',
            'eventFallbackUrl' => null,
            'tag' => 'tag',
            'devices' => [],
            'createdTime' => '2026-03-11T00:00:00Z',
            'updatedTime' => '2026-03-11T00:00:00Z',
        ];
        $this->apiClient->expects($this->once())
            ->method('get')
            ->with("/accounts/{$this->accountId}/endpoints/{$endpointId}")
            ->willReturn($responseData);
        $resp = $this->controller->getEndpoint($endpointId);
        $this->assertInstanceOf(Endpoint::class, $resp);
        $this->assertEquals($endpointId, $resp->id);
    }

    public function testDeleteEndpoint()
    {
        $endpointId = 'ep-1';
        $this->apiClient->expects($this->once())
            ->method('delete')
            ->with("/accounts/{$this->accountId}/endpoints/{$endpointId}");
        $resp = $this->controller->deleteEndpoint($endpointId);
        $this->assertTrue($resp);
    }

    public function testUpdateEndpointBxml()
    {
        $endpointId = 'ep-1';
        $bxml = '<Bxml><SpeakSentence>Hello</SpeakSentence></Bxml>';
        $this->apiClient->expects($this->once())
            ->method('put')
            ->with("/accounts/{$this->accountId}/endpoints/{$endpointId}/bxml", ['bxml' => $bxml]);
        $resp = $this->controller->updateEndpointBxml($endpointId, $bxml);
        $this->assertTrue($resp);
    }
}
