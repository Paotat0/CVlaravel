<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('nama_skill');
            $table->string('jenis');
            $table->string('tingkat')->nullable();
            $table->unique(['nama_skill', 'jenis']);
        });

        Schema::create('pesan_kontak', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->text('pesan');
            $table->timestamps();
        });

        DB::table('skills')->insert([
            ['nama_skill' => 'HTML', 'jenis' => 'hard', 'tingkat' => null],
            ['nama_skill' => 'CSS', 'jenis' => 'hard', 'tingkat' => null],
            ['nama_skill' => 'C language', 'jenis' => 'hard', 'tingkat' => null],
            ['nama_skill' => 'PHP', 'jenis' => 'hard', 'tingkat' => null],
            ['nama_skill' => 'JavaScript', 'jenis' => 'hard', 'tingkat' => null],
            ['nama_skill' => 'Figma', 'jenis' => 'hard', 'tingkat' => null],
            ['nama_skill' => '3D Modeling', 'jenis' => 'hard', 'tingkat' => null],
            ['nama_skill' => 'Desain Grafis', 'jenis' => 'hard', 'tingkat' => null],
            ['nama_skill' => 'Ramah & Komunikatif', 'jenis' => 'soft', 'tingkat' => null],
            ['nama_skill' => 'Memahami Beberapa Bahasa Asing', 'jenis' => 'soft', 'tingkat' => null],
            ['nama_skill' => 'Cepat Belajar (Fast Learner)', 'jenis' => 'soft', 'tingkat' => null],
            ['nama_skill' => 'Fokus Mengerjakan Tugas', 'jenis' => 'soft', 'tingkat' => null],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('pesan_kontak');
        Schema::dropIfExists('skills');
    }
};
