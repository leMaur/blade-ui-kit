<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Layouts;

use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class CustomFont extends BladeComponent
{
    /** @var string */
    public $src;

    /** @var string */
    public $preconnect;

    public function __construct(string $src, string $preconnect = '')
    {
        $this->preconnect = $preconnect;
        $this->src = e($src);

        if ($this->isGoogleFont($src)) {
            $this->src = $this->ensureDisplaySwap($src);
        }
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.layouts.custom-font');
    }

    public function preconnect(): string
    {
        return $this->preconnect !== '' ? $this->preconnect : $this->src;
    }

    protected function isGoogleFont(string $src): bool
    {
        return !! preg_match('/google/', $src);
    }

    protected function ensureDisplaySwap(string $src): string
    {
        return preg_match('/display=swap/', $src) ? $src : $src . '&display=swap';
    }
}
