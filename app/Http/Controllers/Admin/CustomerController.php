<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = User::where('role', 'customer')->latest()->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    public function show(User $user): View
    {
        return view('admin.customers.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.customers.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update($validated);

        return redirect()->route('admin.customers.show', $user)
            ->with('success', 'Customer updated successfully');
    }
    public function destroy(User $user): IlluminateHttpRedirectResponse
{
    $user->delete();
    return redirect()->route('admin.customers')
        ->with('success', 'Customer archived.');
}
}
