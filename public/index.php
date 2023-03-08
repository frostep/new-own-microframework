<?php

declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

$request = ServerRequestFactory::fromGlobals();

// Action
$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new HtmlResponse('Hello, '.$name.'!'))
    ->withHeader('X-Developer', 'frostell')
;

// Sending

$emitter = new SapiEmitter();
$emitter->emit($response);
