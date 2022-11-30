<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    use HasFactory;
    protected $fillable = [ //$fillable buat nama nma kolom yang harus di isi
        'title',
        'description',
        'date',
        'user_id',
        'status',
        'done_time',
    ];
}
