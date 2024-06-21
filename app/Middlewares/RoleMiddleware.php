<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class RoleMiddleware
{
    public function handle(Request $request)
    {
        $role = Auth::user();
        if ($role->role === '1') {
            return $this->checkRoleAdmin($request);
        } elseif ($role->role === '2') {
            return $this->checkRoleSisAdmin($request);
        }
    }

    private function checkRoleAdmin(Request $request)
    {
        app()->redirect('/indexAdmin');
    }

    private function checkRoleSisAdmin(Request $request)
    {
        app()->redirect('/index');
    }
}
