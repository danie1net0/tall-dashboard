<?php

namespace App\Support;

use App\Support\Enums\NotifyType;
use Livewire\Component;

class Notification
{
    protected Component $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function notify(array $options): self
    {
        $this->component->dispatchBrowserEvent('notify', $options);

        return $this;
    }

    public function success(string $title, ?string $description = null): self
    {
        return $this->simpleNotification(NotifyType::SUCCESS, $title, $description);
    }

    public function error(string $title, ?string $description = null): self
    {
        return $this->simpleNotification(NotifyType::ERROR, $title, $description);
    }

    public function info(string $title, ?string $description = null): self
    {
        return $this->simpleNotification(NotifyType::INFO, $title, $description);
    }

    public function warning(string $title, ?string $description = null): self
    {
        return $this->simpleNotification(NotifyType::WARNING, $title, $description);
    }

    public function simpleNotification(NotifyType $type, string $title, ?string $description = null): self {
        $options = [
            'type' => $type,
            'content' => [
                'title' => $title,
                'description' => $description,
            ],
        ];

        $this->notify($options);

        return $this;
    }
}
