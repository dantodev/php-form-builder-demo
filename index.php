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

$container["translator"] = function () {
    $translator = new \Symfony\Component\Translation\Translator('de_DE', new \Symfony\Component\Translation\MessageSelector);
    $translator->addLoader('array', new \Symfony\Component\Translation\Loader\ArrayLoader);
    $translator->addResource('array', [
        "{{name}} must be numeric" => "The field '{{name}}' must be numeric."
    ], 'de_DE');
    return $translator;
};

$app->any("/", function (\Slim\Http\Request $request, \Slim\Http\Response $response) use ($container) {
    $form = new \App\CheckoutForm($container);

    $form->setValidationParams(["translator" => [$this->translator, 'trans']]);

    if ($request->getMethod() == 'POST') {
        $form->hydrate($request->getParams());
        $form->validate();
    }

    return $this->view->render($response, "home.twig", [
        "form" => $form
    ]);
});

$app->run();