<?php

$conf = new \RdKafka\Conf();

$conf->set('bootstrap.servers', '');
$conf->set('security.protocol', 'SASL_SSL');
$conf->set('sasl.mechanism', 'PLAIN');
$conf->set('sasl.username', '');
$conf->set('sasl.password', '');

$producer = new \RdKafka\Producer($conf);

while (true) {
    $message = readline("Write a message: ");

    $topic = $producer->newTopic('default');
    $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
    $producer->flush(1000);
}
