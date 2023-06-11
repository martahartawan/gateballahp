<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAtlet extends Model
{
    use HasFactory;
    protected $fillable = ['nama','umur','tanggallahir','sekolah','prestasi'];
    protected $table = 'dataatlets';

}
