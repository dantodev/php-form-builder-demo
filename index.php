<?php

require __DIR__."/vendor/autoload.php";

$app = new \Slim\App(["settings" => [
    "displayErrorDetails" => true
]]);
$container = $app->getContainer();

$container["view"] = function () {
    $twig = new \Slim\Views\Twig(__DIR__."/templates");
    $twig->addExtension(new \Dtkahl\FormBuilder\TwigRenderableExtension($twig->getEnvironment()));
    return $twig;
};

$app->get("/", function ($request, $response) use ($container) {
    $form = new \App\CheckoutForm($container);
    $form->getField("order_id")->setValue("23456");
    return $this->view->render($response, "home.twig", [
        "form" => $form
    ]);
});

$app->run();