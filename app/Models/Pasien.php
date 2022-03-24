<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Facades\DB;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Pasien extends Model
{
    use HasFactory;

    
    protected $filable = [ 'nama', 'handphone', 'alamat', 'status', 'Tanggal_Masuk', 'Tanggal_Keluar' ];

    


   
}
