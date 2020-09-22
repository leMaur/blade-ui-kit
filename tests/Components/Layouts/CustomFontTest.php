<?php

declare(strict_types=1);

namespace Tests\Components\Layouts;

use Tests\Components\ComponentTestCase;

class CustomFontTest extends ComponentTestCase
{
    /** @test */
    public function it_can_render_to_html()
    {
        $template = <<<HTML
<x-custom-font src="https://rsms.me/inter/inter.css" />
HTML;

        $expected = <<<HTML
<link rel="preconnect" href="https://rsms.me/inter/inter.css" crossorigin />
<link rel="preload" as="style" href="https://rsms.me/inter/inter.css" />
<link rel="stylesheet" href="https://rsms.me/inter/inter.css" media="print" onload="this.media='all'" />
<noscript>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
</noscript>
HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function it_can_render_google_fonts_to_html()
    {
        $template = <<<HTML
<x-custom-font src="https://fonts.googleapis.com/css2?family=Roboto" preconnect="https://fonts.gstatic.com" />
HTML;

        $expected = <<<HTML
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" media="print" onload="this.media='all'" />
<noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" />
</noscript>
HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
