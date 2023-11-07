<?php
return [
    'auth' => \Src\Auth\Auth::class,
    'identity' => \Model\User::class,
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
    ],
    'validators' => [
        'required' => \Validators\RequireValidator::class,
	'unique' => \Validators\UniqueValidator::class,
    ],
    'routeAppMiddleware' => [
	'trim' => \Middlewares\TrimMiddleware::class,
	'speacialChars' => \Middlewares\SpecialCharsMiddleware::class,
	'csrf' => \Middlewares\CSRFMiddleware::class,
	'json' => \Middlewares\JSONMiddleware::class,
    ],
    'providers' => [
        'kernel' => \Providers\KernelProvider::class,
	'route' => \Providers\RouteProvider::class,
	'db' => \Providers\DBProvider::class,
        'auth' => \Providers\AuthProvider::class,
    ],
  
];
