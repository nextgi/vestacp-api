# Description
This package is designed to work with VestaCP. It is friendly to other version of VestaCP such myVesta and Hestia Control Panel. We cannot guarantee it will be interoperable however, we are making an effort to test.
 * [Hestia Control Panel](https://www.hestiacp.com/)
 * [myVESTA](https://www.myvestacp.com/)
 
Currently Available API Packages 
* Dns
   * List DNS Zones (Domains)
   * List Zone Records
   * Zone CRUD
   * Zone Record CRUD
* Domains
   * List Users Domains
   * Domain CRUD

## Installation
```console
composer require nextgi/vestacp-api
```

## Usage Example
```php
use nextgi\VestaCP\VestaApi;

// Initiate SDK. Host example: https://vesta.panel.com:8083/api/
// We have chosen to not predict or extrapolate the host port and final endpoint to prevent too much guess work.
$vesta = new VestaApi('<host>', '<user>', '<password>');
$registrar->dns()->getZoneList('<dns_user>');
```

## Example Response
```json
{
    "1": {
        "RECORD": "@",
        "TYPE": "NS",
        "PRIORITY": "",
        "VALUE": "exampledomain.com.",
        "ID": "1",
        "SUSPENDED": "no",
        "TIME": "15:56:51",
        "DATE": "2021-02-15"
    }
}
```
