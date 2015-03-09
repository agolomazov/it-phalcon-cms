<?php

/**
 *  Переменная окружения
 *  Имеет 3 значения:
 *  - development - включен режим разработки, показываются все ошибки, кроме NOTICE
 *  - testing     - показываются только NOTICE
 *  - production  - отключени сообщения об ошибках (по умолчанию)
 */
define('ENVIRONMENT_WORK', 'development');

switch(ENVIRONMENT_WORK){

    case 'development':
        error_reporting(E_ALL & ~E_NOTICE);
        break;
    case 'testing':
        error_reporting(E_NOTICE);
        break;
    default:
        error_reporting(0);
}

define('APP_DIR', realpath('..').'/app/');

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;

try{

    require_once APP_DIR."vendors/autoload.php";
    $config = new ConfigIni(APP_DIR . 'config/config.ini');

    require_once APP_DIR."config/loader.php";
    require_once APP_DIR."config/services.php";

    $application = new Application($di);
    echo $application->handle()->getContent();


}catch(Exception $e){
    echo $e->getMessage();
}