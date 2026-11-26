<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login() { return view('admin.login'); }
    public function register() { return view('admin.register'); }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['username' => 'Username atau password salah.'])->onlyInput('username');
    }

    public function storeAdmin(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:100', 'unique:users,name'],
            'password' => ['required', 'string', 'min:8', 'max:72', 'confirmed'],
        ]);

        User::create(['name' => $data['username'], 'email' => $data['username'].'@portfolio.local', 'password' => Hash::make($data['password'])]);

        return redirect('/admin')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }

    public function dashboard() { return $this->adminView('admin.dashboard'); }
    public function skills() { return $this->adminView('admin.skills', ['skills' => Skill::orderBy('jenis')->orderBy('nama_skill')->get()]); }
    public function messages() { return $this->adminView('admin.messages', ['messages' => ContactMessage::latest()->get()]); }

    public function storeSkill(Request $request)
    {
        $this->ensureAdmin();
        $data = $request->validate([
            'nama_skill' => ['required', 'string', 'max:150'],
            'jenis' => ['required', 'in:hard,soft'],
            'tingkat' => ['nullable', 'string', 'max:100'],
        ]);
        Skill::create($data);
        return back();
    }

    public function deleteSkill(Skill $skill)
    {
        $this->ensureAdmin();
        $skill->delete();
        return back();
    }

    private function ensureAdmin(): void
    {
        abort_unless(Auth::check(), 401);
    }

    private function adminView(string $view, array $data = [])
    {
        $this->ensureAdmin();
        return view($view, $data);
    }
}
