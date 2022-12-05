<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public bool $xs = false,
        public bool $sm = false,
        public bool $md = false,
        public bool $lg = false,
        public bool $primary = false,
        public bool $secondary = false,
        public bool $success = false,
        public bool $danger = false,
        public bool $warning = false,
        public bool $info = false,
        public bool $rounded = false,
        public string $icon = '',
        public string $rightIcon = '',
    ) {
    }

    public function render(): View
    {
        return view('components.button');
    }

    public function hasSize(): bool
    {
        return $this->xs || $this->sm || $this->md || $this->lg;
    }

    public function hasColor(): bool
    {
        return $this->primary || $this->secondary || $this->success || $this->danger || $this->warning || $this->info;
    }
}
