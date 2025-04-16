<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tgl',
        'no_antrian',
        'pensiunan_id',
        'status',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relasi ke Pensiunan
    public function pensiunan()
    {
        return $this->belongsTo(Pensiunan::class, 'pensiunan_id', 'id');
    }
}
