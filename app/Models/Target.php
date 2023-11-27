<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;
    
    protected $table = 'targets';

    protected $fillable = [
        'user_id',
        'state3',
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
        'state1',
        'jsijil',
        'logopath',
        'sn',
        'sainpath',
        'logo',
        'state2',
        'state3',
        'jawatansain',
        'jabatansain'
        
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function target(){
        return $this->belongsTo(Manual::class, 'id');
    }
}
