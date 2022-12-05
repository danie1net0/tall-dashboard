<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Error extends Component
{
    public function __construct(public string $field)
    {
    }

    public function render(): View
    {
        return view('components.forms.error');
    }
}
