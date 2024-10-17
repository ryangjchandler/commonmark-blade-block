<?php

namespace RyanChandler\CommonmarkBladeBlock;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;
use RyanChandler\CommonmarkBladeBlock\Block\Blade;
use RyanChandler\CommonmarkBladeBlock\Block\Parser\BladeStartParser;
use RyanChandler\CommonmarkBladeBlock\Block\Renderer\BladeRenderer;

class BladeExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment
            ->addBlockStartParser(new BladeStartParser, 100)
            ->addRenderer(Blade::class, new BladeRenderer);
    }
}
