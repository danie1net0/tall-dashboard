<?php

namespace App\View\Components\Dropdown;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public function __construct(public string $icon = '', public string $label = '')
    {
    }

    public function render(): View
    {
        return view('components.dropdown.item');
    }
}
