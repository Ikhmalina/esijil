<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';

    protected $fillable = [
        'user_id',
        'sijil_id',
        'username',
        'peserta',
        'tarikhA',
        'tarikhB',
        'ic',
        'kodsekolah',
        'sekolah',
        'program',
        'tempat',
        'anjuran',
        
        'logopath',
        
        'sainpath',
        
        'jawatansain',
        'jabatansain'
        
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sijil(){
        return $this->belongsTo(Sijil::class, 'sijil_id');
    }
}
