@extends('admin.layout')
@section('title', 'Daftar Admin')
@section('content')
<h1 class="text-2xl font-bold mb-2">Daftar Admin</h1>
@if($errors->any())<p class="mb-4 text-red-400">{{ $errors->first() }}</p>@endif
<form method="post" action="{{ url('/admin/register') }}" class="space-y-5">@csrf
<label class="block">Username<input class="mt-2 w-full rounded-lg border border-slate-600 bg-slate-950 px-4 py-3" name="username" required minlength="3"></label>
<label class="block">Password<input class="mt-2 w-full rounded-lg border border-slate-600 bg-slate-950 px-4 py-3" type="password" name="password" required minlength="8"></label>
<label class="block">Konfirmasi Password<input class="mt-2 w-full rounded-lg border border-slate-600 bg-slate-950 px-4 py-3" type="password" name="password_confirmation" required></label>
<button class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold">Daftar</button>
</form>
@endsection
