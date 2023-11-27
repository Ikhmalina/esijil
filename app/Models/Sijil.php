<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sijil extends Model
{
    use HasFactory;
    
    protected $table = 'sijils';

    protected $fillable = [
        'user_id',
        
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
        'task_id',
        'jsijil',
        'logopath',
        'sn',
        'sainpath',
        
        'jawatansain',
        'jabatansain'
        
    ];

    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function parent()
    {
        return $this->hasOne(Self::class, 'id', 'task_id');
    }

    public function children()
    {
        return $this->hasMany(Self::class, 'task_id', 'id');
    }
   
   
}
