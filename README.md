# ⚡ LARAVEL-TG-WSP-CORE ⚡

> **STATUS:** `OPERATIONAL` | **OWNER:** `FROST` | **VERSION:** `1.0.0`
> *Standardized multi-channel messaging engine for the neon age.*

---

## 🛰️ EL CHASIS (THE CORE)
**Laravel-TG-WSP-Core** es una arquitectura modular diseñada para desacoplar la lógica de tus bots de los proveedores de mensajería (Telegram, WhatsApp, etc.). 

Permite que tu "Cerebro" (Engine) procese mensajes sin importar de qué red vengan, traduciendo todo a un objeto estandarizado: `IncomingMessage`.

---

## 🛠️ INSTALACIÓN (SYSTEM LINK)

Agrega el repositorio a tu `composer.json` (o vía Packagist en el futuro):

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Fr0000st3r/laravel-tg-wsp-core"
    }
],
```

Luego ejecuta el comando de enlace:
```bash
composer require frost/laravel-tg-wsp-core:dev-main
```

Registra el Provider en `bootstrap/providers.php`:
```php
return [
    // ...
    Frost\LaravelTGandWSPCore\LaravelTGandWSPCoreServiceProvider::class,
];
```

---

## 🧬 ARQUITECTURA (DATA FLOW)

1. **Adapter**: Traduce la entrada específica (Telegram/WhatsApp) a `IncomingMessage`.
2. **Contracts**: Interfaz común para estandarizar los datos (Remitente, Texto, Canal).
3. **AgentEngine**: El procesador central que resuelve la respuesta.

### Ejemplo de uso en `routes/telegram.php`:

```php
use Frost\LaravelTGandWSPCore\AgentEngine;
use Frost\LaravelTGandWSPCore\Contracts\IncomingMessage;

$bot->onMessage(function (Nutgram $bot) {
    $engine = app(AgentEngine::class);

    // Normalización del mensaje
    $incoming = new IncomingMessage(
        text: $bot->message()->text,
        senderId: (string) $bot->userId(),
        channel: 'telegram',
        firstName: $bot->message()->from->first_name
    );

    // Respuesta del motor
    $bot->sendMessage($engine->handle($incoming));
});
```

---

## 🕶️ CRÉDITOS
Desarrollado con precisión quirúrgica por **Frost**. 🦾🔥

---
*Powered by Nutgram and Pure Laravel Logic.*
