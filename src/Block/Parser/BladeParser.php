<?php

namespace RyanChandler\CommonmarkBladeBlock\Block\Parser;

use RyanChandler\CommonmarkBladeBlock\Block\Blade;
use League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Util\ArrayCollection;

class BladeParser extends AbstractBlockContinueParser
{
    private Blade $block;

    private ArrayCollection $strings;

    public function __construct()
    {
        $this->block = new Blade();
        $this->strings = new ArrayCollection();
    }

    public function getBlock(): Blade
    {
        return $this->block;
    }

    public function addLine(string $line): void
    {
        $this->strings[] = $line;
    }

    public function closeBlock(): void
    {
        $this->block->setContent(
            ltrim(implode("\n", $this->strings->toArray()))
        );
    }

    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        if ($cursor->match('/^@endblade/')) {
            return BlockContinue::finished();
        }

        return BlockContinue::at($cursor);
    }
}
