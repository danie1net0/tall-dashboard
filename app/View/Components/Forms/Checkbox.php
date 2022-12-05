<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public function __construct(public string $label = '')
    {
    }

    public function render(): View
    {
        return view('components.forms.checkbox');
    }
}
