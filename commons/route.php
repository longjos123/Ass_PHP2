<?php

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Phroute\Phroute\RouteCollector;
function definedRoute($url){
    $router = new RouteCollector();

    $router->get('/', [HomeController::class, 'index']);

    $router->get('login', [LoginController::class, 'loginForm']);
    $router->post('login', [LoginController::class, 'postLogin']);
    $router->any('logout', [LoginController::class, 'logout']);
    $router->get('registerForm', [LoginController::class, 'registerForm']);
    $router->post('register', [LoginController::class, 'createAccount']);

    $router->get('mon-hoc/chi-tiet/', [HomeController::class, 'detailSubject']);

    $router->group(['prefix' => 'quiz'], function ($router){
        $router->get('/', [\App\Controllers\QuizController::class, 'showQuiz']);
        $router->post('checkQuiz/', [\App\Controllers\QuizController::class, 'checkResultQuiz']);
    });

    $router->group(['prefix' => 'admin'], function ($router){
        $router->get('dashboard', [DashboardController::class, 'index']);
        $router->any('logout', [LoginController::class, 'logout']);

        $router->group(['prefix' => 'subject'], function ($router){
            $router->post('add-subject', [\App\Controllers\SubjectController::class, 'saveAdd']);
            $router->any('delete/', [\App\Controllers\SubjectController::class, 'delete']);
            $router->any('detail/', [\App\Controllers\SubjectController::class, 'detailSubject']);
        });
    });



    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;
}

?>