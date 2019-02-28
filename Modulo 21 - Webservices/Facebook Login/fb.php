<?php
session_start();
require __DIR__.'/vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id'                => '358212328237662',
    'app_secret'            => '38519fd86e2ec6db5b485e78310a1bad',
    'default_grafh_version' => 'v2.10'
]);

