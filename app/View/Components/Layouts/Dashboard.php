<?php

namespace App\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dashboard extends Component
{
    public function __construct(public string $title = 'Dashboard')
    {
    }

    public function render(): View
    {
        return view('components.layouts.dashboard');
    }
}
