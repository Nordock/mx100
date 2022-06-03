<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aplikan extends Model
{
    use HasFactory;

    protected $table = "aplikan";
    protected $fillable = [
        'nama_aplikan','email','cv','id_lowongan'
    ];
    static function getAplikan(){
        $return=DB::table('aplikan')
        ->join('lowongan','aplikan.id_lowongan','=','lowongan.id');
        return $return;
    }
}
