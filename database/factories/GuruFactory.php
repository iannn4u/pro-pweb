<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pendidikan_guru = [
            'S1',
            'S2',
            'S3',
            'D4',
            'Profesi',
            'D3',
            'D2',
            'D1'
        ];
        $prodi_guru = [
            'Pendidikan Agama dan Budi Pekerti',
            'Pendidikan Pancasila dan Kewarganegaraan',
            'Bahasa Indonesia',
            'Matematika',
            'Sejarah Indonesia',
            'Bahasa Inggris',
            'Seni Budaya',
            'Pendidikan Jasmani, Olahraga dan Kesehatan',
            'Simulasi dan Komunikasi Digital',
            'Fisika',
            'Kimia',
            'Sistem Komputer',
            'Komputer dan Jaringan Dasar',
            'Pemrograman Dasar',
            'Dasar Desain Grafis',
            'Desain Grafis Percetakan',
            'Desain Media Interaktif',
            'Animasi 2D dan 3D',
            'Teknik Pengolahan Audio dan Video',
            'Produk Kreatif dan Kewirausahaan'
        ];

        return [
            'nama_guru' => fake()->name(),
            'pendidikan_guru' => fake()->randomElement($pendidikan_guru),
            'prodi_guru' => fake()->randomElement($prodi_guru)
        ];
    }
}
