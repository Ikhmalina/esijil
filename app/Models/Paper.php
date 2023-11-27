<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $table = 'paper';

    protected $fillable = [
        'user_id',
        'username',
        'logoname',
        'sainname',
        'uuid',
        'uuid1',
        
        
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
