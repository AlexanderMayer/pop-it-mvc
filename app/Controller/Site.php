<?php

namespace Controller;

use Src\Request;
use Model\Post;
use Src\View;

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

}
