Byte Units Twig extension
=========================

[![Build Status](https://img.shields.io/travis/MarioBlazek/twig-byte-units-extension.svg?style=flat-square)](https://travis-ci.org/MarioBlazek/twig-byte-units-extension)
[![Code Coverage](https://img.shields.io/codecov/c/github/MarioBlazek/twig-byte-units-extension.svg?style=flat-square)](https://codecov.io/gh/MarioBlazek/twig-byte-units-extension)
[![Downloads](https://img.shields.io/packagist/dt/marioblazek/twig-byte-units-extension.svg?style=flat-square)](https://packagist.org/packages/marioblazek/twig-byte-units-extension/stats)
[![Latest stable](https://img.shields.io/packagist/v/marioblazek/twig-byte-units-extension.svg?style=flat-square)](https://packagist.org/packages/marioblazek/twig-byte-units-extension)
[![License](https://img.shields.io/github/license/MarioBlazek/twig-byte-units-extension.svg?style=flat-square)](LICENSE)

This package provides simple Twig filters that wrap [ByteUnits](https://github.com/gabrielelana/byte-units)
lib by [Gabriele Lana](https://github.com/gabrielelana) which makes manipulation with informational units very easy.

## Installation

To install this extension, use Composer:

    composer require marioblazek/twig-byte-units-extension

## Using the extension

In PHP:

```php
$twig = new Twig_Environment($loader, $options);

$twig->addExtension(new Marek\Twig\ByteUnitsExtension());
```

In a Symfony project, you can register the extension as a service:

```yaml
services:
    twig.extension.version:
        class: Marek\Twig\ByteUnitsExtension
        tags:
            - { name: twig.extension }
```

Once set up, you can use the following Twig filters:

* `1322000|byte_units_format_metric('MB')` - Returns value formated in MB as returned by `ByteUnits\Metric::format` method
* `1322000|byte_units_format_binary('MB')` - Returns value formated in MiB as returned by `ByteUnits\Binary::format` method
* `1322000|byte_units_bytes_metric` - Returns the number of bytes as string returned by `ByteUnits\Metric::numberOfBytes` method
* `1322000|byte_units_bytes_binary` - Returns the number of bytes as string returned by `ByteUnits\Binary::numberOfBytes` method

for more information please check [formating section](https://github.com/gabrielelana/byte-units/blob/master/README.md#formatting) on [byte-units repo](https://github.com/gabrielelana/byte-units). 
