@php
$formValues = [
    "nama" => old("nama", ""),
    "email" => old("email", ""),
    "pesan" => old("pesan", ""),
];
$pesanSukses = session("pesan_sukses", "");
$formErrors = $errors->toArray();
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CV Nataka Juro Balakosa - 3D Generalist Artist</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSS Buatan Sendiri -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body class="bg-slate-900 text-slate-100 min-h-screen">

    <!-- Header / Hero Section -->
    <header class="relative border-b border-slate-800 bg-slate-950/50 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 py-4 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h1 id="namaHeader"
                    class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">
                    <?= htmlspecialchars($profile["nama"]) ?>
                </h1>

                <h2>
                    <?= htmlspecialchars($profile["job"]) ?>
                </h2>

                <p class="text-sm font-medium text-slate-400 tracking-wider">
                    <?= htmlspecialchars($profile["nim"]) ?>
                </p>
            </div>
            <div class="flex items-center gap-4">

                <!-- Light & Dark Toggle -->
                <button id="themeToggle" type="button"
                    class="p-2 rounded-lg text-yellow-400 hover:bg-slate-800 transition-colors" aria-label="Ubah tema">
                    <i id="themeIcon" class="fa-solid fa-sun text-lg"></i>
                </button>


                <!-- Hamburger Button -->
                <button id="hamburgerBtn" type="button"
                    class="md:hidden p-2 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 transition-colors"
                    aria-label="Buka menu navigasi">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>

                <!-- Navigation -->
                <nav id="navMenu" class="hidden md:flex flex-col md:flex-row absolute md:static
               top-full left-0 w-full md:w-auto
               bg-slate-950 md:bg-transparent
               border-t md:border-0 border-slate-800
               p-4 md:p-0
               gap-3 md:gap-5
               text-sm">
                    <a href="#Home" class="text-slate-300 hover:text-blue-400 transition-colors">
                        Home
                    </a>
                    <span class="text-slate-600">|</span>
                    <a href="#tentang" class="text-slate-300 hover:text-blue-400 transition-colors">
                        Tentang
                    </a>
                    <span class="text-slate-600">|</span>
                    <a href="#keahlian" class="text-slate-300 hover:text-blue-400 transition-colors">
                        Keahlian
                    </a class="text-slate-300 hover:text-blue-400 transition-colors">
                    <span class="text-slate-600">|</span>
                    <a href="#projek" class="text-slate-300 hover:text-blue-400 transition-colors">
                        Projek
                    </a>
                    <span class="text-slate-600">|</span>
                    <a href="#kontak" class="text-slate-300 hover:text-blue-400 transition-colors">
                        Kontak
                    </a>
                    <span class="text-slate-600">|</span>
                    <a href="/admin" class="text-slate-300 hover:text-blue-400 transition-colors">
                        Admin
                    </a>
                </nav>

            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="max-w-5xl mx-auto px-6 py-10 space-y-12">

        <!-- Home -->
        <section id="Home" class="bg-slate-800/50 rounded-2xl p-6 sm:p-8 border border-slate-700/50 shadow-xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">

                <!-- Teks Tentang Saya: 2/3 -->
                <div class="md:col-span-2">
                    <h1 class="text-xl font-bold">
                        Halo, saya <?= htmlspecialchars($profile["nama"], ENT_QUOTES, "UTF-8") ?>
                    </h1>

                    <h2 class="text-xl font-bold text-slate-100 mb-4 flex items-center gap-3 mt-3">
                        <span class="p-2 bg-blue-500/10 text-blue-400 rounded-lg"><i
                                class="fa-solid fa-user"></i></span>
                        Tentang Saya
                    </h2>

                    <?php if ($profile["status"]): ?>

                        <div
                            class="inline-flex items-center gap-2 mt-4 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 text-sm w-fit">
                            <p>
                                Mahasiswa Aktif
                            </p>
                        </div>

                    <?php else: ?>

                        <div
                            class="inline-flex items-center gap-2 mt-4 px-3 py-2 rounded-lg bg-red-500/10 border border-red-500/30  text-red-400 text-sm font-medium">

                            <p>
                                Bukan Mahasiswa Aktif
                            </p>
                        </div>

                    <?php endif; ?>

                    <p class="text-slate-300 leading-relaxed text-base mt-3">
                        Saya adalah mahasiswa dari kampus <strong>Politeknik Elektronika Negeri Surabaya
                            (PENS)</strong>,
                        dengan kemampuan desain
                        3D saya memiliki dasaran ilmu kreatif
                    </p>
                    <p class="text-slate-300 leading-relaxed text-base mt-3">
                        Melalui pengalaman sebagai panitia di komunitas kampus dan berbagai kegiatan lainnya, saya
                        mengembangkan kemampuan komunikasi, koordinasi, serta <em>problem solving</em>. Saya merupakan
                        pribadi yang cepat belajar, bertanggung jawab, serta mampu beradaptasi dengan lingkungan kerja
                        yang dinamis.
                    </p>
                </div>

                <!-- Image: 1/3 -->
                <div class="md:col-span-1 flex justify-center md:justify-end">
                    <div
                        class="w-full max-w-xs aspect-square overflow-hidden rounded-2xl border border-slate-700/50 shadow-lg bg-slate-900/50">
                        <!-- Ganti src dengan lokasi foto profilmu -->
                        <img src="{{ asset('images/profile.jpg') }}" alt="Foto Profil Nataka Juro Balakosa"
                            class="w-full h-full object-cover">
                    </div>
                </div>

            </div>
        </section>

        <section id="tentang" class="bg-slate-800/50 rounded-2xl p-6 sm:p-8 border border-slate-700/50 shadow-xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                <div class="md:col-span-4 text-justify">
                    Saya adalah mahasiswa Prodi <strong>Teknologi Rekayasa Multimedia</strong> dari kampus
                    Politeknik Elektronika Negeri Surabaya (PENS) yang memiliki pengalaman dalam kepanitiaan dan
                    pengelolaan berbagai kegiatan. Saya familiar dengan kolaborasi bersama dalam suatu tim untuk
                    merancang konsep acara, mengkoordinasikan pelaksanaan kegiatan, serta memastikan acara berjalan
                    dengan lancar.
                </div>
            </div>
        </section>

        <!-- Grid 2 Kolom: Pendidikan & Pengalaman -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Pendidikan (Card Image Hover Overlay) -->
            <section class="bg-slate-800/50 rounded-2xl p-6 sm:p-8 border border-slate-700/50 shadow-xl flex flex-col">
                <h2 class="text-xl font-bold text-slate-100 mb-6 flex items-center gap-3">
                    <span class="p-2 bg-indigo-500/10 text-indigo-400 rounded-lg"><i
                            class="fa-solid fa-graduation-cap"></i></span>
                    Pendidikan
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 h-full">
                    <?php foreach ($education as $item): ?>
                        <div
                            class="relative overflow-hidden rounded-xl group cursor-pointer border border-slate-700/50 h-64">
                            <img src="<?= htmlspecialchars($item["image"], ENT_QUOTES, "UTF-8") ?>"
                                alt="<?= htmlspecialchars($item["image_alt"], ENT_QUOTES, "UTF-8") ?>"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-900/95 via-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-5">
                                <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <h3 class="font-bold text-lg text-slate-100 leading-tight mb-1">
                                        <?= htmlspecialchars($item["institution"], ENT_QUOTES, "UTF-8") ?>
                                    </h3>
                                    <p class="text-sm <?= $item["current"] ? "text-indigo-400" : "text-slate-300" ?> font-medium mb-3">
                                        <?= htmlspecialchars($item["program"], ENT_QUOTES, "UTF-8") ?>
                                    </p>
                                    <span class="text-xs px-3 py-1 rounded-full <?= $item["current"]
                                        ? "bg-indigo-500/20 text-indigo-300 border border-indigo-500/30"
                                        : "text-slate-300 bg-slate-800/80 border border-slate-600/50" ?> backdrop-blur-sm inline-block">
                                        <?= htmlspecialchars($item["period"], ENT_QUOTES, "UTF-8") ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Pengalaman -->
            <section class="bg-slate-800/50 rounded-2xl p-6 sm:p-8 border border-slate-700/50 shadow-xl">
                <h2 class="text-xl font-bold text-slate-100 mb-6 flex items-center gap-3">
                    <span class="p-2 bg-emerald-500/10 text-emerald-400 rounded-lg"><i
                            class="fa-solid fa-briefcase"></i></span>
                    Pengalaman Kepanitiaan
                </h2>

                <div class="space-y-6">
                    <?php foreach ($experience as $item): ?>
                        <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-slate-200">
                                    <?= htmlspecialchars($item["title"], ENT_QUOTES, "UTF-8") ?>
                                </h3>
                                <span class="text-xs px-2 py-0.5 <?= htmlspecialchars($item["role_class"], ENT_QUOTES, "UTF-8") ?> rounded border">
                                    <?= htmlspecialchars($item["role"], ENT_QUOTES, "UTF-8") ?>
                                </span>
                            </div>
                            <ul class="text-sm text-slate-400 list-disc list-inside space-y-1">
                                <?php foreach ($item["responsibilities"] as $responsibility): ?>
                                    <li><?= htmlspecialchars($responsibility, ENT_QUOTES, "UTF-8") ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>

        <!-- Kemampuan (Skills) -->
        <section id="keahlian" class="bg-slate-800/50 rounded-2xl p-6 sm:p-8 border border-slate-700/50 shadow-xl">
            <h2 class="text-xl font-bold text-slate-100 mb-6 flex items-center gap-3">
                <span class="p-2 bg-amber-500/10 text-amber-400 rounded-lg"><i class="fa-solid fa-star"></i></span>
                Kemampuan (Skills)
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Hard Skills -->
                <div class="bg-slate-900/40 p-5 rounded-xl border border-slate-800">
                    <ul class="space-y-3 text-sm text-slate-300">
                        <?php if ($skills["hard"] === []): ?>
                            <li class="text-slate-400">Belum ada hard skill.</li>
                        <?php else: ?>
                            <?php foreach ($skills["hard"] as $skill): ?>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-emerald-400 mt-1"></i>
                                    <span>
                                        <?= htmlspecialchars($skill["nama_skill"], ENT_QUOTES, "UTF-8") ?>
                                        <?php if ($skill["tingkat"] !== null && $skill["tingkat"] !== ""): ?>
                                            <span class="text-slate-500">(<?= htmlspecialchars($skill["tingkat"], ENT_QUOTES, "UTF-8") ?>)</span>
                                        <?php endif; ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Soft Skills -->
                <div class="bg-slate-900/40 p-5 rounded-xl border border-slate-800">
                    <h3
                        class="text-sm font-semibold text-amber-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-users"></i> Soft Skills
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <?php if ($skills["soft"] === []): ?>
                            <p class="text-sm text-slate-400">Belum ada soft skill.</p>
                        <?php else: ?>
                            <?php foreach ($skills["soft"] as $skill): ?>
                                <span
                                    class="px-3 py-1.5 rounded-lg bg-slate-800 text-slate-300 text-sm border border-slate-700 flex items-center gap-2">
                                    <i class="fa-solid fa-star text-amber-400"></i>
                                    <?= htmlspecialchars($skill["nama_skill"], ENT_QUOTES, "UTF-8") ?>
                                    <?php if ($skill["tingkat"] !== null && $skill["tingkat"] !== ""): ?>
                                        <span class="text-slate-500">(<?= htmlspecialchars($skill["tingkat"], ENT_QUOTES, "UTF-8") ?>)</span>
                                    <?php endif; ?>
                                </span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== PROJEK ==================== -->

        <section id="projek" class="bg-slate-800/50 rounded-2xl p-6 sm:p-8 border border-slate-700/50 shadow-xl">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-bold text-slate-100 flex items-center gap-3">
                        <span class="p-2 bg-pink-500/10 text-pink-400 rounded-lg"><i class="fa-solid fa-cube"></i></span>
                        Projek
                    </h2>
                    <p class="text-sm text-slate-400 mt-1">Diurutkan dari tahun terbaru ke terlama</p>
                </div>
                <div class="flex gap-2">
                    <button id="projectPrev" type="button" aria-label="Sebelumnya"
                        class="w-10 h-10 rounded-full bg-slate-900/60 border border-slate-700 text-slate-300 hover:bg-blue-600 hover:text-white transition-all">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button id="projectNext" type="button" aria-label="Berikutnya"
                        class="w-10 h-10 rounded-full bg-slate-900/60 border border-slate-700 text-slate-300 hover:bg-blue-600 hover:text-white transition-all">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <form method="get" action="#projek" class="mb-6 flex flex-wrap items-center gap-3">
                <label for="projectSearch" class="sr-only">Cari projek berdasarkan nama</label>
                <input id="projectSearch" type="search" name="search"
                    value="<?= htmlspecialchars($projectSearch, ENT_QUOTES, "UTF-8") ?>"
                    placeholder="Cari nama projek..."
                    class="w-full sm:w-auto flex-1 min-w-[220px] px-4 py-2 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-500 transition-colors">
                    Cari
                </button>
                <label for="projectType" class="text-sm font-semibold text-slate-300"></label>
                <select id="projectType" name="type" onchange="this.form.submit()"
                    class="px-4 py-2 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua tipe</option>
                    <?php foreach ($projectTypes as $projectType): ?>
                        <option value="<?= htmlspecialchars($projectType, ENT_QUOTES, "UTF-8") ?>"
                            <?= $selectedProjectType === $projectType ? "selected" : "" ?>>
                            <?= htmlspecialchars($projectType, ENT_QUOTES, "UTF-8") ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="projectTitle" class="text-sm font-semibold text-slate-300"></label>
                <select id="projectTitle" name="title" onchange="this.form.submit()"
                    class="px-4 py-2 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua judul</option>
                    <?php foreach ($projectTitles as $projectTitle): ?>
                        <option value="<?= htmlspecialchars($projectTitle, ENT_QUOTES, "UTF-8") ?>"
                            <?= $selectedProjectTitle === $projectTitle ? "selected" : "" ?>>
                            <?= htmlspecialchars($projectTitle, ENT_QUOTES, "UTF-8") ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>

            <!-- Viewport -->
            <div id="projectViewport" class="overflow-hidden">
                <!-- Track (gap-5 = 20px, matches the JS) -->
                <div id="projectSlider" class="flex gap-5 transition-transform duration-500">

                    <?php foreach ($filteredProjects as $project): ?>
                        <div class="project-card flex-shrink-0 w-[85%] sm:w-[48%] lg:w-[31%]
                            relative overflow-hidden rounded-xl border border-slate-700/50 cursor-pointer group"
                            data-title="<?= htmlspecialchars($project['title']) ?>"
                            data-type="<?= htmlspecialchars($project['type']) ?>"
                            data-years="<?= htmlspecialchars($project['years'] ?? '') ?>"
                            data-description="<?= htmlspecialchars($project['description']) ?>"
                            data-image="<?= htmlspecialchars($project['image']) ?>">

                            <img src="<?= htmlspecialchars($project['image']) ?>"
                                alt="<?= htmlspecialchars($project['title']) ?>"
                                class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent
                                opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 p-5">
                                    <h3 class="font-bold text-lg text-white"><?= htmlspecialchars($project['title']) ?></h3>
                                    <p class="text-sm text-blue-400 mt-1"><?= htmlspecialchars($project['type']) ?></p>
                                    <?php if (isset($project['years'])): ?>
                                        <p class="text-sm text-slate-300 mt-1"><?= htmlspecialchars($project['years']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (count($filteredProjects) === 0): ?>
                        <p class="text-slate-400 py-6">Tidak ada projek yang cocok dengan pencarian atau filter.</p>
                    <?php endif; ?>

                </div>
            </div>
        </section>

    </main>

    <!-- Form kontak -->
    <section id="kontak"
        class="w-full max-w-5xl mx-auto px-6 py-6 bg-slate-800/50 rounded-2xl border border-slate-700/50 shadow-xl">

        <!-- Judul -->
        <h2 class="text-xl font-bold text-slate-100 mb-6 flex items-center gap-3">
            <span class="p-2 bg-blue-500/10 text-blue-400 rounded-lg">
                <i class="fa-solid fa-paper-plane"></i>
            </span>
            Hubungi Saya
        </h2>

        <!-- Form -->
        <div class="bg-slate-900/40 p-6 rounded-xl border border-slate-800">

            <form action="{{ url('/kontak') }}" method="post" class="space-y-5"> @csrf
                <?php if (isset($formErrors["form"])): ?>
                    <p class="text-red-400" role="alert"><?= htmlspecialchars($formErrors["form"], ENT_QUOTES, "UTF-8") ?></p>
                <?php endif; ?>

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-semibold text-slate-300 mb-2">
                        Nama
                    </label>

                    <input type="text" id="nama" name="nama" required value="<?= htmlspecialchars($formValues["nama"], ENT_QUOTES, "UTF-8") ?>" aria-invalid="<?= isset($formErrors["nama"]) ? "true" : "false" ?>" placeholder="Masukkan nama" class="w-full px-4 py-3 rounded-xl
                           bg-slate-950
                           border border-slate-700
                           text-slate-100
                           placeholder-slate-500
                           focus:outline-none
                           focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500
                           transition-all">
                    <?php if (isset($formErrors["nama"])): ?>
                        <p class="text-red-400 text-sm mt-2" role="alert"><?= htmlspecialchars($formErrors["nama"], ENT_QUOTES, "UTF-8") ?></p>
                    <?php endif; ?>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">
                        Email
                    </label>

                    <input type="email" id="email" name="email" required value="<?= htmlspecialchars($formValues["email"], ENT_QUOTES, "UTF-8") ?>" aria-invalid="<?= isset($formErrors["email"]) ? "true" : "false" ?>" placeholder="contoh@email.com" class="w-full px-4 py-3 rounded-xl
                           bg-slate-950
                           border border-slate-700
                           text-slate-100
                           placeholder-slate-500
                           focus:outline-none
                           focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500
                           transition-all">
                    <?php if (isset($formErrors["email"])): ?>
                        <p class="text-red-400 text-sm mt-2" role="alert"><?= htmlspecialchars($formErrors["email"], ENT_QUOTES, "UTF-8") ?></p>
                    <?php endif; ?>
                </div>

                <!-- Pesan -->
                <div>
                    <label for="pesan" class="block text-sm font-semibold text-slate-300 mb-2">
                        Pesan
                    </label>

                    <textarea id="pesan" name="pesan" rows="4" required aria-invalid="<?= isset($formErrors["pesan"]) ? "true" : "false" ?>" placeholder="Tulis pesan..." class="w-full px-4 py-3 rounded-xl
                           bg-slate-950
                           border border-slate-700
                           text-slate-100
                           placeholder-slate-500
                           focus:outline-none
                           focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500
                           transition-all
                           resize-none"><?= htmlspecialchars($formValues["pesan"], ENT_QUOTES, "UTF-8") ?></textarea>
                    <?php if (isset($formErrors["pesan"])): ?>
                        <p class="text-red-400 text-sm mt-2" role="alert"><?= htmlspecialchars($formErrors["pesan"], ENT_QUOTES, "UTF-8") ?></p>
                    <?php endif; ?>
                </div>

                <!-- Tombol -->
                <div class="pt-2">
                    <button type="submit" class="px-6 py-3 rounded-xl
                           bg-blue-600
                           hover:bg-blue-500
                           active:bg-blue-700
                           text-white
                           font-semibold
                           transition-all
                           duration-200
                           shadow-lg shadow-blue-900/20">

                        <i class="fa-solid fa-paper-plane mr-2"></i>
                        Kirim Pesan
                    </button>
                </div>

            </form>

        </div>

        <?php if ($pesanSukses !== ""): ?>
            <p class="text-emerald-400 mt-4" role="status"><?= htmlspecialchars($pesanSukses, ENT_QUOTES, "UTF-8") ?></p>
        <?php endif; ?>

    </section>


    <!-- Footer -->
    <footer class="border-t border-slate-800 py-6 text-center text-xs text-slate-500">
        <p>Ã‚Â© 2026 Nataka Juro Balakosa. Prototype Web CV.</p>
    </footer>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>