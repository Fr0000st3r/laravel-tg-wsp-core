<?php

namespace Fr0000st3r\LaravelTGandWSPCore\Contracts;

class IncomingMessage
{
    public function __construct(
        public string $text,
        public string $senderId,
        public string $channel, // 'telegram', 'whatsapp', etc.
        public ?string $firstName = null,
        public array $metadata = []
    ) {}
}
