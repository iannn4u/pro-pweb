<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    protected $fillable = ['nis', 'nama_siswa', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'no_hp', 'agama', 'id_kelas'];
    public $timestamps = false;

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas','id_kelas');
    }
}
