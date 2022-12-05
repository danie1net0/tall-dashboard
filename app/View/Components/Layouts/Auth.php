<?php

namespace App\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Auth extends Component
{
    public function __construct(public string $title = '')
    {
        if (!$title) {
            $this->title = config('app.name');
        }
    }

    public function render(): View
    {
        return view('components.layouts.auth');
    }
}
