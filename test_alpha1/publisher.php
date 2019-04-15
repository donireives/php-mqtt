<?php

$client = new Mosquitto\Client();
$client->onConnect('connect');
$client->onDisconnect('disconnect');
$client->onPublish('publish');
$client->connect("localhost", 1883, 5);

while (true) {
	try{
		$client->loop();
		$mid = $client->publish('/mqtt', "Hello from PHP!");
		$client->loop();
	}catch(Mosquitto\Exception $e){
		return;
	}
	// sleep(1);
}

$client->disconnect();
unset($client);

function connect($r) {
	echo "I got code {$r}\n";
}

function publish() {
	global $client;
	echo "Mesage published\n";
	$client->disconnect();
}

function disconnect() {
	echo "Disconnected cleanly\n";
}

# Running this php file on Terminal or browser

?>