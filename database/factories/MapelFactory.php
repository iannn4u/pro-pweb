<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mapel>
 */
class MapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mapel = [
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
            'nama_mapel' => fake()->randomElement($mapel),
            'id_guru' => fake()->numberBetween(1, 100),
            'jam_mapel' => fake()->numberBetween(1, 20)
        ];
    }
}
