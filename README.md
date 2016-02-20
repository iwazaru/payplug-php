# PHP library for the PayPlug for openssl 0.9.8o

This is a unofficial fork of the official [PHP library for the PayPlug API](https://github.com/payplug/payplug-php).

The official library requires openssl 1.0.1 or newer, so it can't be used on OVH shared hosting servers where the provided openssl version is 0.9.8o.

This fork tests for openssl 0.9.8o or newer so it won't fail on OVH shared hosting. I have not made any other changes.

This has not been tested.  
Use at your own risks.  
Do not use in production.  
Dot not use at all if you can avoid it.

[Original library README](https://github.com/payplug/payplug-php)
