<?php

namespace RyanChandler\CommonmarkBladeBlock\Block\Renderer;

use Illuminate\Support\Facades\Blade as Engine;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use RyanChandler\CommonmarkBladeBlock\Block\Blade;

class BladeRenderer implements NodeRendererInterface
{
    /**
     * @param Blade $node
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        Blade::assertInstanceOf($node);

        return Engine::render($node->getContent());
    }
}
