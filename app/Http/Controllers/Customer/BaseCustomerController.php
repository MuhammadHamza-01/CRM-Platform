<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class BaseCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
        $this->middleware(function ($request, $next) {
            if (!auth()->check() || !auth()->user()->isCustomer()) {
                return redirect()->route('login');
            }
            return $next($request);
        });
    }
}