# @iammati/site_dev

A beautiful exception handler since TYPO3's looks meh.

Uses `spatie/ignition` btw.

## Why?

Why not

## Installation

Install the package with composer using `composer req site/site-dev` and configure your `~/typo3conf/AdditionalConfiguration.php` as this:

```php
use Site\SiteDev\Error\DebugExceptionHandler;

$GLOBALS['TYPO3_CONF_VARS']['SYS']['debugExceptionHandler'] = DebugExceptionHandler::class;
```

Copy the `~/vendor/site/site-dev/.ignition.dist.php` file into `~/config/system/.ignition.php`.

Done!
