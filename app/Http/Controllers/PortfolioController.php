<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(Request $request): View
    {
        $profile = [
            'nama' => 'Nataka Juro Balakosa',
            'job' => '3D Generalist Artist',
            'nim' => '5325600087',
            'prodi' => 'Teknologi Rekayasa Multimedia',
            'email' => 'nama@email.com',
            'status' => true,
        ];

        $education = [
            ['institution' => 'Politeknik Elektronika Negeri Surabaya (PENS)', 'program' => 'Teknologi Rekayasa Multimedia', 'period' => 'Sekarang (Aktif)', 'image' => '/images/sekolah2.jpg', 'image_alt' => 'Kampus PENS', 'current' => true],
            ['institution' => 'SMKN 4 Malang', 'program' => 'Animasi', 'period' => '2022 - 2025', 'image' => '/images/sekolah1.jpg', 'image_alt' => 'SMKN 4 Malang', 'current' => false],
        ];

        $experience = [
            ['title' => 'Geekupwakeup Malang 2024', 'role' => 'Anggota', 'role_class' => 'bg-slate-800 text-slate-400 border-slate-700', 'responsibilities' => ['Menampilkan dan menjalankan Game yang telah dikembangkan oleh studio.']],
            ['title' => 'Komunitas Janaka PENS 2026', 'role' => 'Panitia', 'role_class' => 'bg-slate-800 text-slate-400 border-slate-700', 'responsibilities' => ['Mengkonsep kegiatan bersama panitia lain.', 'Menjalankan acara weekly.']],
            ['title' => 'Sosialisasi & Peresmian SMART DRYVA by Jeeva 2026', 'role' => 'OC', 'role_class' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20', 'responsibilities' => ['Anggota tim acara & menerima tamu undangan.', 'Menyiapkan konsumsi peserta dan tamu undangan.']],
        ];

        $projects = [
            ['title' => 'Project 3D Character', 'type' => '3D Modeling', 'years' => '2024', 'description' => 'Project pembuatan karakter 3D yang saya kerjakan menggunakan software 3D. Project ini meliputi modeling, texturing, lighting, dan rendering.', 'image' => '/images/project1.jpg'],
            ['title' => 'Project Environment', 'type' => '3D Environment', 'years' => '2026', 'description' => 'Project pembuatan environment 3D dengan fokus pada modeling environment, material, pencahayaan, dan suasana visual.', 'image' => '/images/project2.png'],
            ['title' => 'Project Animasi', 'type' => 'Animation', 'years' => '2024', 'description' => 'Project animasi yang saya kerjakan untuk mengembangkan kemampuan dalam animation, storytelling, dan visual design.', 'image' => '/images/project3.jpg'],
            ['title' => 'Project Game', 'type' => 'Game Development', 'years' => '2024', 'description' => 'Project game yang saya kerjakan bersama tim. Saya berkontribusi dalam bagian visual dan asset 3D.', 'image' => '/images/project4.jpg'],
            ['title' => 'Project UI/UX', 'type' => 'UI/UX Design', 'years' => '2026', 'description' => 'Perancangan antarmuka dan pengalaman pengguna untuk aplikasi digital, mulai dari wireframe hingga prototype.', 'image' => '/images/project5.jpg'],
            ['title' => 'Project Website Portfolio', 'type' => 'Web Development', 'years' => '2026', 'description' => 'Pembuatan website portfolio responsif untuk menampilkan profil, keahlian, dan hasil karya.', 'image' => '/images/project6.png'],
            ['title' => 'Project Product Visualization', 'type' => '3D Visualization', 'years' => '2026', 'description' => 'Pembuatan visualisasi produk 3D dengan pemodelan, material, pencahayaan, dan rendering.', 'image' => '/images/project7.png'],
        ];
        usort($projects, fn ($a, $b) => strcmp($b['years'], $a['years']));

        $projectTypes = array_values(array_unique(array_column($projects, 'type')));
        $projectTitles = array_column($projects, 'title');
        $selectedProjectType = $request->query('type', '');
        $selectedProjectTitle = $request->query('title', '');
        $projectSearch = trim((string) $request->query('search', ''));
        $filteredProjects = array_values(array_filter($projects, fn ($project) =>
            ($selectedProjectType === '' || $project['type'] === $selectedProjectType)
            && ($selectedProjectTitle === '' || $project['title'] === $selectedProjectTitle)
            && ($projectSearch === '' || stripos($project['title'], $projectSearch) !== false)
        ));

        $hardSkills = Skill::where('jenis', 'hard')->orderBy('nama_skill')->get();
        $softSkills = Skill::where('jenis', 'soft')->orderBy('nama_skill')->get();
        $skills = ['hard' => $hardSkills, 'soft' => $softSkills];

        return view('mainpage', compact(
            'profile', 'education', 'experience', 'projects', 'projectTypes',
            'projectTitles', 'selectedProjectType', 'selectedProjectTitle',
            'projectSearch', 'filteredProjects', 'skills'
        ));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'pesan' => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create($validated);

        return redirect('/#kontak')->with('pesan_sukses', 'Terima kasih, '.$validated['nama'].'! Pesan Anda berhasil dikirim.');
    }
}
