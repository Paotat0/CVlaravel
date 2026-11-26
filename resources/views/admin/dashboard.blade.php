@extends('admin.layout')
@section('title', 'Dashboard Admin')
@section('content')
<header class="mb-8 flex justify-between gap-4"><div><h1 class="text-3xl font-bold">Dashboard Admin</h1><p class="mt-2 text-slate-400">Login sebagai {{ Auth::user()->name }}</p></div><form method="post" action="{{ url('/admin/logout') }}">@csrf<button class="rounded-lg border border-slate-600 px-4 py-2">Logout</button></form></header>
<div class="grid gap-6 md:grid-cols-2"><section class="rounded-xl border border-slate-700 bg-slate-900/40 p-6"><h2 class="text-xl font-semibold">Keahlian</h2><a class="mt-4 inline-block rounded-lg bg-blue-600 px-4 py-2" href="{{ url('/admin/skills') }}">Kelola keahlian</a></section><section class="rounded-xl border border-slate-700 bg-slate-900/40 p-6"><h2 class="text-xl font-semibold">Pesan Kontak</h2><a class="mt-4 inline-block rounded-lg bg-blue-600 px-4 py-2" href="{{ url('/admin/messages') }}">Buka daftar pesan</a></section></div>
@endsection
