<?php

namespace App\Controllers;

use App\Database\TaskDAO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class HomeController
{
    private PhpRenderer $view;
    private TaskDAO $taskDAO;

    public function __construct(PhpRenderer $view, TaskDAO $taskDAO)
    {
        $this->view = $view;
        $this->taskDAO = $taskDAO;
    }

    public function home(Request $request, Response $response, array $args): Response
    {
        return $this->view->render($response, 'home.php', [
            'pageTitle' => 'Home - My App',
            'tasks' => $this->taskDAO->listAll(),
        ]);
    }
}
