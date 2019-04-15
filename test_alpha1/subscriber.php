<?php

$client = new Mosquitto\Client();
$client->onConnect('connect');
$client->onDisconnect('disconnect');
$client->onSubscribe('subscribe');
$client->onMessage('message');
$client->connect("localhost", 1883, 60);
$client->subscribe('/#', 1);

while (true) {
	$client->loop();
	// sleep(1);
}

$client->disconnect();
unset($client);

function connect($r) {
	echo "I got code {$r}\n";
}

function subscribe() {
	echo "Subscribed to a topic\n";
}

function message($message) {
	printf("\nGot a message on topic %s with payload:%s",
	$message->topic, $message->payload);
}

function disconnect() {
	echo "Disconnected cleanly\n";
}

# Running this php file on Terminal

# check this on other terminal
# mosquitto_pub -h localhost -t '/mqtt' -m "Test Push"
# mosquitto_pub -h localhost -t '/a' -m "Test Push"

?>