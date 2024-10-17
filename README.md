# Embed Laravel Blade code inside of your Markdown templates.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/commonmark-blade-block.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/commonmark-blade-block)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ryangjchandler/commonmark-blade-block/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ryangjchandler/commonmark-blade-block/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ryangjchandler/commonmark-blade-block/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ryangjchandler/commonmark-blade-block/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/commonmark-blade-block.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/commonmark-blade-block)

This package provides an extension for [`league/commonmark`](https://github.com/thephpleague/commonmark) that lets you embed [Laravel Blade code](https://laravel.com/docs/blade) inside of your Markdown content.

## Installation

You can install the package via Composer:

```bash
composer require ryangjchandler/commonmark-blade-block
```

## Usage

Start by registering the extension.

```php
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use RyanChandler\CommonmarkBladeBlock\BladeExtension;

$environment = new Environment();

$environment
    ->addExtension(new CommonMarkCoreExtension)
    ->addExtension(new BladeExtension);

$converter = new MarkdownConverter($environment);
```

Then start embedding Blade inside of your Markdown content with the `@blade` and `@endblade` tags.

```md
# Hello, world!

@blade
<x-button>
    Click me!
</x-button>
@endblade
```

### Using Laravel's `Str` or `str()` helpers

If you're using `Str::markdown()` or `str()->markdown()`, then you can register the extension through the `extensions` argument.

```php
Str::markdown(
    <<<'MD'
    @blade
        <x-button></x-button>
    @endblade
    MD,
    extensions: [
        new BladeExtension(),
    ]
)
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
