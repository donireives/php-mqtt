# PHP-MQTT
subscriber and publisher MQTT

sudo apt-get install php-pear
sudo apt-get install php7-dev

sudo apt-add-repository ppa:mosquitto-dev/mosquitto-ppa
sudo apt-get update
sudo apt-get install libmosquitto-dev
sudo apt-get install mosquitto mosquitto-clients
sudo pecl install Mosquitto-alpha

Add extension=mosquitto.so to php.ini
