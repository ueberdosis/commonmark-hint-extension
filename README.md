> We need your support to maintain this package. 💖 https://github.com/sponsors/ueberdosis

# CommonMark Hint Extension

[![](https://img.shields.io/packagist/v/ueberdosis/commonmark-hint-extension.svg)](https://packagist.org/packages/ueberdosis/commonmark-hint-extension)
[![Tests](https://github.com/ueberdosis/commonmark-hint-extension/actions/workflows/test.yml/badge.svg?branch=main)](https://github.com/ueberdosis/commonmark-hint-extension/actions/workflows/test.yml)
[![](https://img.shields.io/packagist/dt/ueberdosis/commonmark-hint-extension.svg)](https://packagist.org/packages/ueberdosis/commonmark-hint-extension)
[![Sponsor](https://img.shields.io/static/v1?label=Sponsor&message=%E2%9D%A4&logo=GitHub)](https://github.com/sponsors/ueberdosis)

A hint extension for [league/commonmark](https://github.com/thephpleague/commonmark) that renders the following Markdown as HTML.

## Example

### Markdown
```md
:::important Warning!
This is how the **Markdown** looks.
:::
```

### HTML
```html
<div class="hint important">
    <h2 class="hint-title">
        Warning!
    </h2>
    <p class="hint-content">
        This is how the <strong>Markdown</strong> looks.
    </p>
</div>
```

## Installation

You can install the package via composer:

```bash
composer require ueberdosis/commonmark-hint-extension
```

## Usage

```php
<?php

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;
use Ueberdosis\CommonMark\HintExtension;

// Configure the Environment with all the CommonMark parsers/renderers
$environment = new Environment();
$environment->addExtension(new CommonMarkCoreExtension());

// Add this extension
$environment->addExtension(new HintExtension());

// Instantiate the converter engine and start converting some Markdown!
$converter = new MarkdownConverter($environment);
$markdown = <<<MARKDOWN
:::important Warning!
This is how the **Markdown** looks.
:::
MARKDOWN;

echo $converter->convertToHtml($markdown);
```

## Testing

```bash
composer test
```

## Credits

- [Hans Pagel](https://github.com/hanspagel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
