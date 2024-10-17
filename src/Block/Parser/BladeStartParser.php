<?php

namespace RyanChandler\CommonmarkBladeBlock\Block\Parser;

use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;

class BladeStartParser implements BlockStartParserInterface
{
    const REGEX = '/^@blade/';

    public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
    {
        if ($cursor->isIndented()) {
            return BlockStart::none();
        }

        if (! $cursor->match(self::REGEX)) {
            return BlockStart::none();
        }

        return BlockStart::of(new BladeParser)->at($cursor);
    }
}
