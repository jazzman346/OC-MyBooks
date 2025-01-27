<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Register Services.
$app['dao.book'] = $app->share(function ($app) {
    $book = new MyBooks\DAO\BookDAO($app['db']);
    // Passing AuthorDAO for author retrieval
    $book->setAuthorDAO(new MyBooks\DAO\AuthorDAO($app['db']));
    return $book;
});