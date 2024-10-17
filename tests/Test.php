<?php

use League\CommonMark\CommonMarkConverter;
use RyanChandler\CommonmarkBladeBlock\BladeExtension;

it('renders a blade block', function () {
    $html = render(<<<'MD'
    @blade
        <h1>{{ 'Hello, world' }}</h1>
    @endblade
    MD);

    expect($html)->toContain('<h1>Hello, world</h1>');
});

function render(string $markdown): string
{
    $converter = new CommonMarkConverter;

    $converter->getEnvironment()->addExtension(new BladeExtension);

    return $converter->convert($markdown);
}
