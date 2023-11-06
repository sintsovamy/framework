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
    ],
];
