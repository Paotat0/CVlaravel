@extends('admin.layout')
@section('title', 'Login Admin')
@section('content')
<h1 class="text-2xl font-bold mb-2">Login Admin</h1>
<p class="mb-6 text-slate-400">Masuk untuk membuka dashboard admin.</p>
@if(session('success'))<p class="mb-4 text-emerald-400">{{ session('success') }}</p>@endif
@if($errors->any())<p class="mb-4 text-red-400">{{ $errors->first() }}</p>@endif
<form method="post" action="{{ url('/admin/login') }}" class="space-y-5">
@csrf
<label class="block">Username<input class="mt-2 w-full rounded-lg border border-slate-600 bg-slate-950 px-4 py-3" name="username" value="{{ old('username') }}" required></label>
<label class="block">Password<input class="mt-2 w-full rounded-lg border border-slate-600 bg-slate-950 px-4 py-3" type="password" name="password" required></label>
<button class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold">Login</button>
</form>
<p class="mt-5 text-sm text-slate-400">Belum memiliki akun? <a class="text-blue-300" href="{{ url('/admin/register') }}">Daftar di sini</a></p>
@endsection
