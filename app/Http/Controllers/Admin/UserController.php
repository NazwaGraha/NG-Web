<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the users (Super User is strictly hidden).
     */
    public function index(Request $request)
    {
        $query = User::where('role', '!=', 'super_user')
            ->where('email', '!=', 'nazwagraha@gmail.com');

        // Search filter
        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Role filter
        if ($request->filled('role') && in_array($request->input('role'), ['supervisor', 'admin'])) {
            $query->where('role', $request->input('role'));
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        // Count summaries
        $totalUsers = User::where('role', '!=', 'super_user')
            ->where('email', '!=', 'nazwagraha@gmail.com')->count();
        $totalSupervisors = User::where('role', 'supervisor')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        return view('admin.users.index', compact('users', 'totalUsers', 'totalSupervisors', 'totalAdmins'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'role' => ['required', 'in:supervisor,admin'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar di sistem.',
            'role.required' => 'Pilih salah satu tipe pengguna.',
            'role.in' => 'Tipe pengguna hanya boleh Supervisor atau Admin.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'avatar.image' => 'File foto profil harus berupa gambar.',
            'avatar.mimes' => 'Format foto profil yang diizinkan: JPG, JPEG, PNG, WEBP.',
            'avatar.max' => 'Ukuran foto profil maksimal 3MB.',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('avatars', $filename, 'public');
            $avatarPath = 'storage/' . $path;
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'avatar' => $avatarPath,
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', "Pengguna {$user->name} ({$user->role_label}) berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        // Protect Super User from being viewed/edited via management form
        if ($user->isSuperUser() || $user->email === 'nazwagraha@gmail.com') {
            abort(403, 'Akun Super User bersifat root terproteksi dan tidak dapat diakses dari menu ini.');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        // Protect Super User from being edited
        if ($user->isSuperUser() || $user->email === 'nazwagraha@gmail.com') {
            abort(403, 'Akun Super User bersifat root terproteksi dan tidak dapat diubah.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => ['required', 'in:supervisor,admin'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah digunakan oleh akun lain.',
            'role.required' => 'Pilih salah satu tipe pengguna.',
            'role.in' => 'Tipe pengguna hanya boleh Supervisor atau Admin.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'avatar.image' => 'File foto profil harus berupa gambar.',
            'avatar.mimes' => 'Format foto profil yang diizinkan: JPG, JPEG, PNG, WEBP.',
            'avatar.max' => 'Ukuran foto profil maksimal 3MB.',
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar && str_starts_with($user->avatar, 'storage/avatars/')) {
                $oldPath = str_replace('storage/', '', $user->avatar);
                Storage::disk('public')->delete($oldPath);
            }
            $file = $request->file('avatar');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('avatars', $filename, 'public');
            $user->avatar = 'storage/' . $path;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', "Data pengguna {$user->name} berhasil diperbarui!");
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // 1. Role Admin cannot delete any data
        if (!Auth::user()->canDelete()) {
            abort(403, 'Akses ditolak: Akun bertipe Admin tidak memiliki izin untuk menghapus data.');
        }

        // 2. Protect Super User from deletion
        if ($user->isSuperUser() || $user->email === 'nazwagraha@gmail.com') {
            abort(403, 'Akun Super User bersifat root terproteksi dan tidak dapat dihapus.');
        }

        // 3. Cannot delete currently active user
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri yang sedang aktif digunakan.');
        }

        if ($user->avatar && str_starts_with($user->avatar, 'storage/avatars/')) {
            $oldPath = str_replace('storage/', '', $user->avatar);
            Storage::disk('public')->delete($oldPath);
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', "Pengguna {$userName} berhasil dihapus dari sistem!");
    }
}
