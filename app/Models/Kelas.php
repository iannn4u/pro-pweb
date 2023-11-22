<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $guarded = ['id_kelas'];
    public $timestamps = false;

    public function guru() {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}
