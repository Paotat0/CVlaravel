@extends('admin.layout')
@section('title', 'Kelola Keahlian')
@section('content')
<h1 class="text-2xl font-bold mb-6">Kelola Keahlian</h1>
<form method="post" action="{{ url('/admin/skills') }}" class="grid gap-3 md:grid-cols-4 mb-8">@csrf
<input class="rounded-lg bg-slate-950 border border-slate-700 px-4 py-3" name="nama_skill" placeholder="Nama keahlian" required>
<select class="rounded-lg bg-slate-950 border border-slate-700 px-4 py-3" name="jenis"><option value="hard">Hard skill</option><option value="soft">Soft skill</option></select>
<input class="rounded-lg bg-slate-950 border border-slate-700 px-4 py-3" name="tingkat" placeholder="Tingkat (opsional)">
<button class="rounded-lg bg-blue-600 px-4 py-3 font-semibold">Tambah</button></form>
@foreach($skills as $skill)<div class="flex justify-between border-b border-slate-700 py-3"><span>{{ $skill->nama_skill }} <small class="text-slate-400">({{ $skill->jenis }}{{ $skill->tingkat ? ' - '.$skill->tingkat : '' }})</small></span><form method="post" action="{{ url('/admin/skills/'.$skill->id) }}">@csrf @method('DELETE')<button class="text-red-400">Hapus</button></form></div>@endforeach
<a class="mt-6 inline-block text-blue-300" href="{{ url('/admin/dashboard') }}">Kembali ke dashboard</a>
@endsection
