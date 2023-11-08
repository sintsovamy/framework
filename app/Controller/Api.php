<?php

namespace Controller;

use Model\Post;
use Src\Request;
use Src\View;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Api
{
    public function index(): void
    {
        $posts = Post::all()->toArray();

        (new View())->toJSON($posts);
    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }

    public function login(Request $request)
    {
	    $password = md5($request->password);
	    if (Auth::attempt($request->all())) {
		    $token = Auth::generateAuthToken();
		    (new View())->toJSON(['user_token' => $token]);
	    }
	     (new View())->toJSON(['password' => 'auth failed', 'hash' => $password], 401);
    }

    public function signup(Request $request)
    {
        $validator = new Validator($request->all(), [
            'name' => ['required'],
            'login' => ['required', 'unique:users,login'],
            'password' => ['required']
                ], [
            'required' => 'Поле :field пусто',
            'unique' => 'Поле :field должно быть уникально'
            ]);
        
	if ($validator->fails()) {
                (new View())->toJSON(['fails' => $validator->errors()], 401);
	}

        $token = Auth::generateAuthToken();
	(new View())->toJSON(['user_token' => $token], 201);
    }
}

