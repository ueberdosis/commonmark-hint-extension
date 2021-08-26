<?php

namespace Ueberdosis\CommonMark\Tests;

use PHPUnit\Framework\TestCase;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;
use Ueberdosis\CommonMark\HintExtension;

class HintExtensionTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
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

        $this->assertEquals((string) $converter->convertToHtml($markdown), '<div class="hint important">
    <h2 class="hint-title">
        Warning!
    </h2>
    <p class="hint-content">
        This is how the <strong>Markdown</strong> looks.
    </p>
</div>');
    }
}
