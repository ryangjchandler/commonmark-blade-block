<?php

namespace RyanChandler\CommonmarkBladeBlock\Block;

use League\CommonMark\Node\Block\AbstractBlock;

final class Blade extends AbstractBlock
{
    public function __construct(
        private string $content = ''
    ) {}

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
