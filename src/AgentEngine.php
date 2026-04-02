<?php

namespace Fr0000st3r\LaravelTGandWSPCore;

use Fr0000st3r\LaravelTGandWSPCore\Contracts\IncomingMessage;

class AgentEngine
{
    /**
     * Procesa cualquier mensaje entrante y decide la respuesta.
     */
    public function handle(IncomingMessage $message): string
    {
        // Por ahora, lógica de "Echo" para pruebas
        $text = trim($message->text);
        $name = $message->firstName ?? 'amigo';
        
        if (strtolower($text) === '/start') {
            return "¡Hola {$name}!";
        }

        return "Mensaje recibido, {$name}: '{$text}' (vía {$message->channel}).";
    }
}
