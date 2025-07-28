<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // This method can be used to show the admin login page or dashboard
        return view('dashboard.admin.auth.login'); // Adjust the view path as necessary
    }

    public function store(AdminLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.admin', absolute: false));
        
    }

    public function destroy(Request $request)
    {
        
        auth('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to the home page or login page
    }
}
