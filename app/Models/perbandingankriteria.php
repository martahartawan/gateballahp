<?php

namespace App\Models;
use App\Models\kriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganKriteria extends Model
{
    use HasFactory;
    protected $table = 'perbandingan_kriteria';

    protected $fillable = ['kriteria_id1', 'kriteria_id2', 'nilai'];

    public function kriteria1()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id1');
    }

    public function kriteria2()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id2');
    }

}
