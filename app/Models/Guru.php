<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $guarded = ['id_guru'];
    public $timestamps = false;

    public function kelas() {
        return $this->hasMany(Kelas::class, 'id_guru', 'id_guru');
    }
}