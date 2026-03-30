<?php

/**
 * BrtcModelTest.php
 *
 * Unit tests for BRTC model classes
 *
 * @copyright Bandwidth INC
 */

use PHPUnit\Framework\TestCase;

final class BrtcModelTest extends TestCase
{
    public function testEndpointEventModel() {
        $device = new BandwidthLib\BRTC\Models\Device('dev-123', 'Test Device', 'ACTIVE', '2025-01-01T00:00:00Z');

        $event = new BandwidthLib\BRTC\Models\EndpointEvent(
            'ep-123',
            'WEBRTC',
            'ACTIVE',
            '2025-01-01T00:00:00Z',
            '2025-01-02T00:00:00Z',
            'test-tag',
            '2025-01-01T01:00:00Z',
            'DEVICE_CONNECTED',
            $device
        );

        $this->assertEquals('ep-123', $event->endpointId);
        $this->assertEquals('WEBRTC', $event->type);
        $this->assertEquals('ACTIVE', $event->status);
        $this->assertEquals('2025-01-01T00:00:00Z', $event->creationTimestamp);
        $this->assertEquals('2025-01-02T00:00:00Z', $event->expirationTimestamp);
        $this->assertEquals('test-tag', $event->tag);
        $this->assertEquals('2025-01-01T01:00:00Z', $event->eventTime);
        $this->assertEquals('DEVICE_CONNECTED', $event->eventType);
        $this->assertInstanceOf(BandwidthLib\BRTC\Models\Device::class, $event->device);
        $this->assertEquals('dev-123', $event->device->deviceId);

        $json = $event->jsonSerialize();
        $this->assertEquals('ep-123', $json['endpointId']);
        $this->assertEquals('DEVICE_CONNECTED', $json['eventType']);
        $this->assertEquals('2025-01-01T01:00:00Z', $json['eventTime']);
    }

    public function testEndpointEventModelDefaults() {
        $event = new BandwidthLib\BRTC\Models\EndpointEvent();
        $this->assertNull($event->endpointId);
        $this->assertNull($event->type);
        $this->assertNull($event->device);
        $this->assertNull($event->eventType);
    }

    public function testDeviceModel() {
        $device = new BandwidthLib\BRTC\Models\Device('dev-456', 'My Phone', 'ACTIVE', '2025-01-01T00:00:00Z');

        $this->assertEquals('dev-456', $device->deviceId);
        $this->assertEquals('My Phone', $device->deviceName);
        $this->assertEquals('ACTIVE', $device->status);
        $this->assertEquals('2025-01-01T00:00:00Z', $device->creationTimestamp);

        $json = $device->jsonSerialize();
        $this->assertEquals('dev-456', $json['deviceId']);
        $this->assertEquals('My Phone', $json['deviceName']);
        $this->assertEquals('ACTIVE', $json['status']);
        $this->assertEquals('2025-01-01T00:00:00Z', $json['creationTimestamp']);
    }

    public function testDeviceModelDefaults() {
        $device = new BandwidthLib\BRTC\Models\Device();
        $this->assertNull($device->deviceId);
        $this->assertNull($device->deviceName);
        $this->assertNull($device->status);
        $this->assertNull($device->creationTimestamp);
    }

    public function testPageModel() {
        $page = new BandwidthLib\BRTC\Models\Page(20, 100, 5, 1);

        $this->assertEquals(20, $page->pageSize);
        $this->assertEquals(100, $page->totalElements);
        $this->assertEquals(5, $page->totalPages);
        $this->assertEquals(1, $page->pageNumber);

        $json = $page->jsonSerialize();
        $this->assertEquals(20, $json['pageSize']);
        $this->assertEquals(100, $json['totalElements']);
        $this->assertEquals(5, $json['totalPages']);
        $this->assertEquals(1, $json['pageNumber']);
    }

    public function testPageModelDefaults() {
        $page = new BandwidthLib\BRTC\Models\Page();
        $this->assertNull($page->pageSize);
        $this->assertNull($page->totalElements);
    }

    public function testLinkModel() {
        $link = new BandwidthLib\BRTC\Models\Link('self', 'https://api.bandwidth.com/endpoints');

        $this->assertEquals('self', $link->rel);
        $this->assertEquals('https://api.bandwidth.com/endpoints', $link->href);

        $json = $link->jsonSerialize();
        $this->assertEquals('self', $json['rel']);
        $this->assertEquals('https://api.bandwidth.com/endpoints', $json['href']);
    }

    public function testErrorObjectModel() {
        $error = new BandwidthLib\BRTC\Models\ErrorObject('VALIDATION_ERROR', 'Field is required');

        $this->assertEquals('VALIDATION_ERROR', $error->type);
        $this->assertEquals('Field is required', $error->description);

        $json = $error->jsonSerialize();
        $this->assertEquals('VALIDATION_ERROR', $json['type']);
        $this->assertEquals('Field is required', $json['description']);
    }
}
