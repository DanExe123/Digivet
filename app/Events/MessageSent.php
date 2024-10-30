<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\BroadcastsEvents;
use App\Models\User;
use App\Models\Message;

class MessageSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels, BroadcastsEvents;

    public $message;
    public $user;

    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('chat');
    }

    public function broadcastWith()
    {
        return [
            'user' => $this->user,
            'message' => $this->message,
        ];
    }
}
