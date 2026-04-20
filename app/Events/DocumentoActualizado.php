<?php

namespace App\Events;

//use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Documento;
use App\Models\Grupo;

class DocumentoActualizado implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $documento;

    /**
     * Create a new event instance.
     */
    public function __construct(Documento $documento)
    {
        $this->documento = $documento;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('grupo.' . $this->documento->grupo_id),
        ];
    }

    public function broadcastAs(){
        return 'DocumentoActualizado';
    }

    public function broadcastWith(){
        return [
            'contenido' => $this->documento->contenido
        ];
    }
}
