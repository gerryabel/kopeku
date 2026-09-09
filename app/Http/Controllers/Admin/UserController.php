<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $banned = $request->input('banned'); // '1', '0', atau null
        $role = $request->input('role');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when(!is_null($banned), function ($query) use ($banned) {
                $query->where('banned', $banned);
            })
            ->when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->latest()
            ->paginate(10)
            ->appends([
                'search' => $search,
                'banned' => $banned,
                'role' => $role,
            ]);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'role' => 'required|in:member,admin',
        ]);

        // Upload avatar jika ada
        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        $validated['banned'] = false;

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|string|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'role' => 'required|in:admin,member',
        ]);

        // Handle avatar upload jika ada
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && \Storage::disk('public')->exists($user->avatar)) {
                \Storage::disk('public')->delete($user->avatar);
            }

            // Simpan avatar baru
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Jika password kosong, jangan update
        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }

    public function ban(User $user)
    {
        $user->update(['banned' => true]);
        return back()->with('success', 'User berhasil dibanned.');
    }

    public function unban(User $user)
    {
        $user->update(['banned' => false]);
        return back()->with('success', 'User berhasil di-unban.');
    }

    public function banUser($id)
    {
        $user = User::findOrFail($id);
        $user->banned = true;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil dibanned.');
    }
}
