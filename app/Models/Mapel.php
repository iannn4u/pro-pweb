<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $primaryKey = 'kd_mapel';
    protected $guarded = ['kd_mapel'];
    public $timestamps = false;

    public function guru() {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}
