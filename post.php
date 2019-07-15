<?php

    require 'vendor/autoload.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $entryData = array(
        'category' => "notifications", 
        'title'    => "Test"
    );

    $context = new ZMQContext();
    $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
    $socket->connect("tcp://localhost:5555");

    $socket->send(json_encode($entryData));