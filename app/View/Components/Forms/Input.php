<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(public string $label = '', public string $icon = '')
    {
    }

    public function render(): View
    {
        return view('components.forms.input');
    }
}
