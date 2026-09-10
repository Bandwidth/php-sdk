# CodeRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**to** | **string** | The phone number to send the mfa code to. |
**from** | **string** | The application phone number, the sender of the mfa code. |
**application_id** | **string** | The application unique ID, obtained from Bandwidth. |
**scope** | **string** | An optional field to denote what scope or action the mfa code is addressing.  If not supplied, defaults to \&quot;2FA\&quot;. | [optional]
**message** | **string** | The message format of the mfa code.  There are three values that the system will replace \&quot;{CODE}\&quot;, \&quot;{NAME}\&quot;, \&quot;{SCOPE}\&quot;.  The \&quot;{SCOPE}\&quot; and \&quot;{NAME} value template are optional, while \&quot;{CODE}\&quot; must be supplied.  As the name would suggest, code will be replace with the actual mfa code.  Name is replaced with the application name, configured during provisioning of mfa.  The scope value is the same value sent during the call and partitioned by the server. |
**digits** | **int** | The number of digits for your mfa code.  The valid number ranges from 2 to 8, inclusively. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
