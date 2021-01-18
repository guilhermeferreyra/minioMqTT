<?php

$client = new Mosquitto\Client('Minio');

$client->setCredentials('infiniit','1nfini!T');
 

$client->onConnect(function($code, $message) use ($client){
    
    $client->subscribe('minio/eventos', 0);
});

$client->onMessage(function($message){
    
    $jsonPayload = json_decode($message->payload);
    echo $jsonPayload;
    }
);

$client->connect('localhost', 1885);

$client->loopForever();
?>