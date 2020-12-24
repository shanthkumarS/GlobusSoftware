<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;

class AdminLoginController extends Controller
{
    /**
     * @return View
     */
    public function create()
    {
        return view('admin.login');
    }

    /**
     * @return View
     */
    public function show()
    {
        return view('admin.user-list', ['guard' => 'admin']);
    }

    /**
     * @param  LoginRequest  $request
     * @return RedirectResponse
     */
    public function store(AdminLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
    }

    /**
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
