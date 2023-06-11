<?php

namespace App\Models;
use App\Models\PerbandinganKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $fillable = ['nama'];

    public function perbandingankriteria()
    {
        return $this->hasMany(PerbandinganKriteria::class,'kriteria_id');
    }
    public function perbandinganKriteria1()
    {
        return $this->hasMany(PerbandinganKriteria::class, 'kriteria_id1');
    }

    public function perbandinganKriteria2() 
    {
        return $this->hasMany(PerbandinganKriteria::class, 'kriteria_id2');
    }
}
