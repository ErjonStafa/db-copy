<?php

namespace Erjon\DbCopy\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Notifications extends Component
{
    /** @var ?Collection<Collection> */
    public ?Collection $notifications = null;

    public function __construct()
    {
        $this->notifications = collect([]);
    }

    #[On('notify')]
    public function notify($type, $message): void
    {
        $this->notifications->push(collect(['type' => $type, 'message' => $message]));
    }

    public function removeNotification($key): void
    {
        $this->notifications->forget($key);
    }

    public function render()
    {
        return view('dbcopy::components.notifications', [
            'leftNotifications' => $this->notifications,
        ]);
    }
}
