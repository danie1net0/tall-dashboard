<?php

namespace App\View\Traits;

use App\Support\Notification;

trait Actions
{
    public function notification(): Notification
    {
        return new Notification($this);
    }
}
