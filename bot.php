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
    $discord->on(Event::MESSAGE_CREATE, function (Message $message) {
        if ($message->author->bot) {
            return;
        }

        if ($message->content === 'ping') {
            $message->reply('pong');
        }
    });
});

$discord->run();
