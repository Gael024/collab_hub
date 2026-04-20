<?php

namespace App\Events;

use App\Models\Mensaje;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MensajeEnviado implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $mensaje;

    /**
     * Create a new event instance.
     */
    public function __construct(Mensaje $mensaje)
    {
        $this->mensaje = $mensaje->load('user');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('grupo.' . $this->mensaje->grupo_id),
        ];
    }

    public function broadcastAs(){
        return 'MensajeEnviado';
    }
}
