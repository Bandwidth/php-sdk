# MultiChannelAction

This model is an `anyOf` wrapper: a value is at least one of the member types listed below.
It is never instantiated directly — use one of the concrete types.

## anyOf

- [**\Bandwidth\Model\RbmActionBase**](RbmActionBase.md)
- [**\Bandwidth\Model\RbmActionDial**](RbmActionDial.md)
- [**\Bandwidth\Model\RbmActionViewLocation**](RbmActionViewLocation.md)
- [**\Bandwidth\Model\MultiChannelActionCalendarEvent**](MultiChannelActionCalendarEvent.md)
- [**\Bandwidth\Model\RbmActionOpenUrl**](RbmActionOpenUrl.md)

The concrete type is selected by the `type` discriminator property.

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
