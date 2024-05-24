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


// class TestOne 
// {
//     private $timeSleep = 5;
//     private static $redisHost = '127.0.0.1';
//     private static $redisPort = 6379;
//     public $redisx;

//     public function __construct() 
//     {

//     }

//     public function redisConnect()
//     {
//         $this->redisx = new Redis();
//         $this->redisx->connect(self::$redisHost, self::$redisPort);
//     }

//     public function rSet($key, $value) 
//     {
//         $this->redisx->set($key, $value);
//     }

//     public function rGet($key) 
//     {
//         return $this->redisx->get($key);
//     }

// }

// $r = new TestOne();
// $r->redisConnect();
// $r->rSet('key', 123);
// echo $r->rGet('key');

