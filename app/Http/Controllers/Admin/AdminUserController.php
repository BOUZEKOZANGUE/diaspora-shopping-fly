<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends AdminController
{
    public function index()
    {
        $users = User::withCount('packages')
            ->withSum('packages', 'price')
            ->latest()
            ->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load(['packages' => fn($q) => $q->latest()]);
        return view('admin.users.show', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:admin,user'
        ]);

        $user->update($validated);
        return back()->with('success', 'Rôle mis à jour');
    }
}
