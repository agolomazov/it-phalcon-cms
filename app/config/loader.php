<?php

$loader = new \Phalcon\Loader();

$loader->registerDirs(
    array(
        APP_DIR . $config->application->controllersDir,
        APP_DIR . $config->application->pluginsDir,
        APP_DIR . $config->application->modelsDir,
    )
)->register();