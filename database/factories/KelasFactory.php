<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kelas = [
            'X RPL 1', 'X RPL 2', 'X RPL 3', 'X RPL 4', 'X RPL 5', 'X TKR 1', 'X TKR 2', 'X TKR 3', 'X TKR 4', 'X TITL 1', 'X TITL 2', 'X AUVI 1', 'X AUVI 2', 'X AUVI 3', 'XI RPL 1', 'XI RPL 2', 'XI RPL 3', 'XI RPL 4', 'XI RPL 5', 'XI TKR 1', 'XI TKR 2', 'XI TKR 3', 'XI TKR 4', 'XI TITL 1', 'XI TITL 2', 'XI AUVI 1', 'XI AUVI 2', 'XI AUVI 3', 'XII RPL 1', 'XII RPL 2', 'XII RPL 3', 'XII RPL 4', 'XII RPL 5', 'XII TKR 1', 'XII TKR 2', 'XII TKR 3', 'XII TKR 4', 'XII TITL 1', 'XII TITL 2', 'XII AUVI 1', 'XII AUVI 2', 'XII AUVI 3',
        ];
        $jurusan = [
            'Rekayasa Perangkat Lunak',
            'Teknik Instalasi Tenaga Listrik',
            'Teknik Audio Video',
            'Teknik Kendaraan Ringan'
        ];

        return [
            'nama_kelas' => fake()->randomElement($kelas),
            'jurusan' => fake()->randomElement($jurusan),
            'kapasitas_kelas' => fake()->numberBetween(25, 35),
            'id_guru' => fake()->numberBetween(1, 100)
        ];
    }
}
