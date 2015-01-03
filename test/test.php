<?php

require __DIR__.'/config.php';

$di->setShared('flash', function() {
    $flash = new \flip\flash-msg\FlashMSG();
    return $flash;
});

// Other services, modules, controllers here

// Starts the session (required by the Flashy class)
$app->session;

// Extra stylesheet
$app->theme->addStylesheet('css/flash.css');

// Routes
$app->router->add('', function() use ($app) {

    $app->theme->setTitle("Flash test");

    $app->session;

    $app->flash->message('info', 'This is a info message');
    $app->flash->message('success', 'This is a success message');
    $app->flash->message('warning', 'This is a warning message');
    $app->flash->message('error', 'This is a error message');
    

    $app->theme->setVariable('title', "Flash test")
           ->setVariable('main', $app->flash->getMessages());
 
});

$app->router->handle();
$app->theme->render();