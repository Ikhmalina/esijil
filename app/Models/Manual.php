<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;

    protected $table = 'manuals';

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
        'state2',
        'jawatansain',
        'jabatansain'
        
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}