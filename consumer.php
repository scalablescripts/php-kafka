<?php

$conf = new \RdKafka\Conf();

$conf->set('bootstrap.servers', '');
$conf->set('security.protocol', 'SASL_SSL');
$conf->set('sasl.mechanism', 'PLAIN');
$conf->set('sasl.username', '');
$conf->set('sasl.password', '');
$conf->set('group.id', 'group');
$conf->set('auto.offset.reset', 'earliest');

$consumer = new \RdKafka\KafkaConsumer($conf);

$consumer->subscribe(['default']);

while (true) {
    $message = $consumer->consume(5000);

    var_dump($message->payload);
}
