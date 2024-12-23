<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'alamat',
        'ucapan',
        'kehadiran',
        'userid',
        'ket'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
