<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $guarded = ['id_nilai'];
    public $timestamps = false;

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'nis','nis');
    }
    public function mapel() {
        return $this->belongsTo(Mapel::class, 'kd_mapel','kd_mapel');
    }
}
