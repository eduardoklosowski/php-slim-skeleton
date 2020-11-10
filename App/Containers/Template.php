<?php

use Slim\Views\PhpRenderer;

$container->set(PhpRenderer::class, function () {
    $view = new PhpRenderer(PROJECT_DIR . '/views', [
        'pageTitle' => 'My App',
    ]);
    $view->setLayout('layout.php');
    return $view;
});
