# Bandwidth\MediaApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteMedia()**](MediaApi.md#deleteMedia) | **DELETE** /users/{accountId}/media/{mediaId} | Delete Media |
| [**getMedia()**](MediaApi.md#getMedia) | **GET** /users/{accountId}/media/{mediaId} | Get Media |
| [**listMedia()**](MediaApi.md#listMedia) | **GET** /users/{accountId}/media | List Media |
| [**uploadMedia()**](MediaApi.md#uploadMedia) | **PUT** /users/{accountId}/media/{mediaId} | Upload Media |


## `deleteMedia()`

```php
deleteMedia($account_id, $media_id)
```
### URI(s):
- https://messaging.bandwidth.com/api/v2 Production
Delete Media

Deletes a media file from Bandwidth API server. Make sure you don't have any application scripts still using the media before you delete.  If you accidentally delete a media file you can immediately upload a new file with the same name.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\MediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | This is your 7-digit Bandwidth Account ID, as shown in the Bandwidth App. The older ID format (`u-be8dvafwrs63rwpm7pfil4b`) is deprecated.  **When migrating to OAuth authentication, you must use the 7-digit Account ID.**
$media_id = bw.png; // string | The ID of the media file.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteMedia($account_id, $media_id, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling MediaApi->deleteMedia: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| This is your 7-digit Bandwidth Account ID, as shown in the Bandwidth App. The older ID format (&#x60;u-be8dvafwrs63rwpm7pfil4b&#x60;) is deprecated.  **When migrating to OAuth authentication, you must use the 7-digit Account ID.** | |
| **media_id** | **string**| The ID of the media file. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

void (empty response body)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMedia()`

```php
getMedia($account_id, $media_id): \SplFileObject
```
### URI(s):
- https://messaging.bandwidth.com/api/v2 Production
Get Media

Downloads a media file you previously uploaded.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\MediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | This is your 7-digit Bandwidth Account ID, as shown in the Bandwidth App. The older ID format (`u-be8dvafwrs63rwpm7pfil4b`) is deprecated.  **When migrating to OAuth authentication, you must use the 7-digit Account ID.**
$media_id = bw.png; // string | The ID of the media file.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getMedia($account_id, $media_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MediaApi->getMedia: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| This is your 7-digit Bandwidth Account ID, as shown in the Bandwidth App. The older ID format (&#x60;u-be8dvafwrs63rwpm7pfil4b&#x60;) is deprecated.  **When migrating to OAuth authentication, you must use the 7-digit Account ID.** | |
| **media_id** | **string**| The ID of the media file. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listMedia()`

```php
listMedia($account_id, $continuation_token): \Bandwidth\Model\Media[]
```
### URI(s):
- https://messaging.bandwidth.com/api/v2 Production
List Media

Gets a list of your media files. No query parameters are supported.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\MediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | This is your 7-digit Bandwidth Account ID, as shown in the Bandwidth App. The older ID format (`u-be8dvafwrs63rwpm7pfil4b`) is deprecated.  **When migrating to OAuth authentication, you must use the 7-digit Account ID.**
$continuation_token = 1XEi2tsFtLo1JbtLwETnM1ZJ+PqAa8w6ENvC5QKvwyrCDYII663Gy5M4s40owR1tjkuWUif6qbWvFtQJR5/ipqbUnfAqL254LKNlPy6tATCzioKSuHuOqgzloDkSwRtX0LtcL2otHS69hK343m+SjdL+vlj71tT39; // string | Continuation token used to retrieve subsequent media.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listMedia($account_id, $continuation_token, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MediaApi->listMedia: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| This is your 7-digit Bandwidth Account ID, as shown in the Bandwidth App. The older ID format (&#x60;u-be8dvafwrs63rwpm7pfil4b&#x60;) is deprecated.  **When migrating to OAuth authentication, you must use the 7-digit Account ID.** | |
| **continuation_token** | **string**| Continuation token used to retrieve subsequent media. | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\Media[]**](../Model/Media.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadMedia()`

```php
uploadMedia($account_id, $media_id, $body, $content_type, $cache_control)
```
### URI(s):
- https://messaging.bandwidth.com/api/v2 Production
Upload Media

Upload a file. You may add headers to the request in order to provide some control to your media file.  If a file is uploaded with the same name as a file that already exists under this account, the previous file will be overwritten.  A list of supported media types can be found at [Bandwidth Support](https://www.bandwidth.com/support/en/articles/12823220-what-mms-file-types-are-supported).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\MediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | This is your 7-digit Bandwidth Account ID, as shown in the Bandwidth App. The older ID format (`u-be8dvafwrs63rwpm7pfil4b`) is deprecated.  **When migrating to OAuth authentication, you must use the 7-digit Account ID.**
$media_id = bw.png; // string | The ID of the media file.
$body = '/path/to/file.txt'; // \SplFileObject
$content_type = audio/wav; // string | The media type of the entity-body.
$cache_control = no-cache; // string | General-header field is used to specify directives that MUST be obeyed by all caching mechanisms along the request/response chain.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->uploadMedia($account_id, $media_id, $body, $content_type, $cache_control, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling MediaApi->uploadMedia: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| This is your 7-digit Bandwidth Account ID, as shown in the Bandwidth App. The older ID format (&#x60;u-be8dvafwrs63rwpm7pfil4b&#x60;) is deprecated.  **When migrating to OAuth authentication, you must use the 7-digit Account ID.** | |
| **media_id** | **string**| The ID of the media file. | |
| **body** | **\SplFileObject****\SplFileObject**|  | |
| **content_type** | **string**| The media type of the entity-body. | [optional] |
| **cache_control** | **string**| General-header field is used to specify directives that MUST be obeyed by all caching mechanisms along the request/response chain. | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

void (empty response body)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`, `application/ogg`, `application/pdf`, `application/rtf`, `application/zip`, `application/x-tar`, `application/xml`, `application/gzip`, `application/x-bzip2`, `application/x-gzip`, `application/smil`, `application/javascript`, `audio/mp4`, `audio/mpeg`, `audio/ogg`, `audio/flac`, `audio/webm`, `audio/wav`, `audio/amr`, `audio/3gpp`, `image/bmp`, `image/gif`, `image/heic`, `image/heif`, `image/jpeg`, `image/pjpeg`, `image/png`, `image/svg+xml`, `image/tiff`, `image/webp`, `image/x-icon`, `text/css`, `text/csv`, `text/calendar`, `text/html`, `text/plain`, `text/javascript`, `text/vcard`, `text/vnd.wap.wml`, `text/xml`, `video/avi`, `video/mp4`, `video/mpeg`, `video/ogg`, `video/quicktime`, `video/webm`, `video/x-ms-wmv`, `video/x-flv`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
