<?php

const TIME_SLEEP = 5;

$msg = 'Дождитесь завершения программы и попробуйте снова. <a href="/">Обновить</a>';

# Версия Redis 7.2.5

$redis = new Redis();

$redis->connect('127.0.0.1', 6379);

if ($redis->get('start') == true) {
    echo $msg;
} else {
    $redis->set('start', true);
    sleep(TIME_SLEEP);
    $redis->unlink('start');
}


