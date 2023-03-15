<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class ClientController extends SkeletonServices
{
    public function login()
    {
        $auth = $this->authClient();
        if ($auth['code'] == 200) {
            return redirect('/dashboard');
        }

        return redirect('/');
    }

    public function logout()
    {
        Cache::forget('client');
        Cache::forget('token');
        return redirect('/');
    }
}
