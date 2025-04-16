<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pensiunan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function antrian()
    {
        return $this->hasMany(Pensiunan::class, 'pensiunan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    
}
