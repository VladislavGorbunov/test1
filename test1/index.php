<?php

const TIME_SLEEP = 5;
const REDIS_HOST = '127.0.0.1';
const REDIS_PORT = 6379;

$msg = 'Дождитесь завершения программы и попробуйте снова.';

# Версия Redis 7.2.5

$redis = new Redis();

$redis->connect(REDIS_HOST, REDIS_PORT);

if ($redis->get('start') == true) {
    echo $msg;
} else {
    $redis->set('start', true);
    sleep(TIME_SLEEP);
    $redis->unlink('start');
}


