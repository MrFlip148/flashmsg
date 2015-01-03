<?php

require __DIR__.'/config_with_app.php';

$di->setShared('flash', function()
{
    $flash = new \flip\FlashMSG\FlashMSG();
    return $flash;
});

// Other services, modules, controllers here

// Starts the session (required by the Flashy class)
$app->session;

// Extra stylesheet
$app->theme->addStylesheet('css/flashmsg.css');

// Routes
$app->router->add('', function() use ($app) {

    $app->theme->setTitle("Flash test");

    $app->session;

    $app->flash->message('info', 'Information this is');
    $app->flash->message('success', 'Success! Process worked fine');
    $app->flash->message('warning', 'I sense a disturbance in the Force');
    $app->flash->message('error', 'The Dark Side has struck again');
    

    $app->theme->setVariable('title', "Flash test")
           ->setVariable('main', $app->flash->getMessages());
 
});

$app->router->handle();
$app->theme->render();