<?php

require __DIR__.'/vendor/autoload.php';

$app = new \Slim\App([]);
$container = $app->getContainer();

$container['view'] = function () {
    return new \Slim\Views\Twig(__DIR__.'/templates');
};

$app->get('/', function ($request, $response) use ($container) {
    $form = new \App\CheckoutForm($container);
    return $this->view->render($response, 'home.twig', [
            'form' => $form
    ]);
});

$app->run();