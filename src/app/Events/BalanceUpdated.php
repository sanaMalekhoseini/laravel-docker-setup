<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BalanceUpdated implements  ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $balance;
    public $userId;
    /**
     * Create a new event instance.
     */
    public function __construct($balance, $user)
    {
        $this->balance = $balance;
        $this->userId = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [new PrivateChannel('user.' . $this->userId)];
    }

    public function broadcastWith(): array
    {
        return ['balance' => $this->balance];
    }
}
