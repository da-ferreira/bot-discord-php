<?php

include __DIR__ . '/vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$discord = new Discord([
    'token' => $_ENV['BOT_TOKEN'],
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    // Listen for messages
    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        if (!$message->author->bot) {
            $message->reply('Olá amigo');
        }

    });
});

$discord->run();
