<?php

if(YII_ENV_DEV){
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=yii2basic',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];
}else{
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.3.1.2;dbname=yii2basic',
        'username' => 'adminuhDwPqV',
        'password' => '6qLeK7ydVPfP',
        'charset' => 'utf8',
    ];
}

