<?php

namespace Controller;

use Src\Request;
use Model\Post;
use Src\View;
use Model\User;
use Src\Auth\Auth;

class Site
{
   public function index(Request $request): string
   {
      $posts = Post::where('id', $request->id)->get();
      return (new View())->render('site.post', ['posts' => $posts]);
   }

   public function hello(): string
   {
       return new View('site.hello', ['message' => 'hello working']);
   }

    public function signup(Request $request): string
    {
       if ($request->method === 'POST' && User::create($request->all())) {
           app()->route->redirect('/hello');
       }
       return new View('site.signup');
    }

    public function login(Request $request): string
    {
       //Если просто обращение к странице, то отобразить форму
       if ($request->method === 'GET') {
           return new View('mysite.login');

       }

       //Если удалось аутентифицировать пользователя, то редирект
       if (Auth::attempt($request->all())) {
           $checkrole = Auth::user();
           if ($checkrole->role == 2) app()->route->redirect('/index');
           else app()->route->redirect('/indexAdmin');
       }
       //Если аутентификация не удалась, то сообщение об ошибке
       return new View('mysite.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
       Auth::logout();
       app()->route->redirect('/hello');
    }

    public function indexSisAdm(): string
     {
        return (new View())->render('mysite.index');
     }

    public function indexAdmin(Request $request): string
     {
        if ($request->method === 'GET') {
            return (new View())->render('mysite.indexAdmin');
        }
        else {
            $data = $request->all();
            User::create([
                'name'=>$data['name'],
                'lastname'=>$data['lastname'],
                'surname'=>$data['surname'],
                'login'=>$data['login'],
                'password'=>$data['password'],
                'role'=> 2 ,
            ]);
        }
        return (new View())->render('mysite.indexAdmin');
     }
}
