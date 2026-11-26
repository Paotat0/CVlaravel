@extends('admin.layout')
@section('title', 'Pesan Kontak')
@section('content')
<h1 class="text-2xl font-bold mb-6">Pesan Kontak</h1>
@forelse($messages as $message)<article class="mb-4 rounded-xl border border-slate-700 p-5"><strong>{{ $message->nama }}</strong> <span class="text-slate-400">{{ $message->email }}</span><p class="mt-2">{{ $message->pesan }}</p></article>@empty<p class="text-slate-400">Belum ada pesan.</p>@endforelse
<a class="mt-6 inline-block text-blue-300" href="{{ url('/admin/dashboard') }}">Kembali ke dashboard</a>
@endsection
