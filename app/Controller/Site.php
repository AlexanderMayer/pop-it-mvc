<?php

namespace Controller;

use Src\Request;
use Src\View;
use Model\User;
use Src\Auth\Auth;
use Model\User_phone;
use Model\Department;
use Model\Employee;
use Model\Phone;
use Model\Room;
use Illuminate\Support\Facades\Redirect;

class Site
{
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
        app()->route->redirect('/login');
    }

    public function indexSisAdm(): string
    {
        return (new View())->render('mysite.index');
    }

    public function indexAdmin(Request $request): string
    {
        if ($request->method === 'GET') {
            return (new View())->render('mysite.indexAdmin');
        } else {
            $data = $request->all();
            User::create([
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'surname' => $data['surname'],
                'login' => $data['login'],
                'password' => $data['password'],
                'role' => 2,
            ]);
        }
        return Redirect::to('/indexAdmin');
    }

    public function addNewUser(Request $request): string
    {
        $departments = Department::all();
        if ($request->method === 'POST') {
            $data = $request->all();
            Employee::create([
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'surname' => $data['surname'],
                'birthday' => $data['birthday'],
                'department' => $data['department'],
            ]);
            return new View('mysite.addnewuser', ['message' => 'Абонент добавлен', 'departments' => $departments]);
        }
        return (new View())->render('mysite.addnewuser', ['departments' => $departments]);
    }

    public function users(Request $request): string
    {
        $departments = Department::all();
        $selectedDepartments = $request->all();
        if ($request->method === 'POST') {
            $employees = Employee::whereIn('department', $selectedDepartments)->get();
        } else {
            $employees = Employee::all();
        };
        $employees_count = count($employees);
        return (new View())->render('mysite.users', ['departments' => $departments, 'employees_count' => $employees_count]);
    }

    public function userPhones(Request $request): string
    {
        $employees = Employee::all();
        $phones = Phone::all();
        if ($request->method === 'POST') {
            $data = $request->all();
            User_phone::create([
                'employees' => $data['employees'],
                'phone' => $data['phone'],
            ]);
            return new View('mysite.userPhones', ['employees' => $employees, 'phones' => $phones]);
        }
        return (new View())->render('mysite.userPhones', ['employees' => $employees, 'phones' => $phones]);
    }

    public function departmentPhone(Request $request): string
    {
        return (new View())->render('mysite.departmentPhone');
    }
    public function addUserPhone(Request $request): string
    {
        $employees = Employee::all();
        $phones = Phone::all();
        if ($request->method === 'POST'){
            $data = $request->all();
            User_phone::create([
                'employees' => $data['employees'],
                'phone' => $data['phone'],
            ]);
            return new View('mysite.addUserPhone', ['message' => 'Телефон привязан к пользователю', 'employees' => $employees, 'phones' => $phones]);
        }
        return (new View())->render('mysite.addUserPhone', ['employees' => $employees, 'phones' => $phones]);
    }
    public function addNewRoom(Request $request): string
    {
        $departments = Department::all();
        if ($request->method === 'POST'){
            $data = $request->all();
            Room::create([
                'number' => $data['number'],
                'type' => $data['type'],
                'department' => $data['department'],
            ]);
            return new View('mysite.addNewRoom', ['message' => 'Комната добавлена', 'departments' => $departments]);
        }
        return (new View())->render('mysite.addNewRoom', ['departments' => $departments]);
    }
    public function addNewPhone(Request $request): string
    {
        $rooms = Room::all();
        if ($request->method === 'POST') {
            $data = $request->all();
            Phone::create([
                'number' => $data['number'],
                'room' => $data['room'],
            ]);
            return new View('mysite.addNewPhone', ['message' => 'Телефон добавлен', 'rooms' => $rooms]);
        }
        return (new View())->render('mysite.addNewPhone', ['rooms' => $rooms]);
    }

    public function addNewDepartment(Request $request): string
    {
        if ($request->method === 'POST'){
            $data = $request->all();
            Department::create([
                'name' => $data['name'],
                'type' => $data['type'],
            ]);
            return new View('mysite.addNewDepartment', ['message' => 'Подразделение добавлено']);
        }
        return (new View())->render('mysite.addNewDepartment');
    }










//   public function index(Request $request): string
//   {
//      $posts = Post::where('id', $request->id)->get();
//      return (new View())->render('site.post', ['posts' => $posts]);
//   }
//
//   public function hello(): string
//   {
//       return new View('site.hello', ['message' => 'hello working']);
//   }
//
//    public function signup(Request $request): string
//    {
//       if ($request->method === 'POST' && User::create($request->all())) {
//           app()->route->redirect('/hello');
//       }
//       return new View('site.signup');
//    }
//
//    public function login(Request $request): string
//    {
//       //Если просто обращение к странице, то отобразить форму
//       if ($request->method === 'GET') {
//           return new View('mysite.login');
//       }
//       //Если удалось аутентифицировать пользователя, то редирект
//       if (Auth::attempt($request->all())) {
//           app()->route->redirect('/hello');
//       }
//       //Если аутентификация не удалась, то сообщение об ошибке
//       return new View('mysite.login', ['message' => 'Неправильные логин или пароль']);
//    }
//
//    public function logout(): void
//    {
//       Auth::logout();
//       app()->route->redirect('/hello');
//    }
//
//    public function indexSisAdm(): string
//     {
//        return (new View())->render('mysite.index');
//     }
}
