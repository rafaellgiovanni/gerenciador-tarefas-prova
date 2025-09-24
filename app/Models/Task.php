<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- CORRIGIDO
use Illuminate\Database\Eloquent\Model;                 // <-- CORRIGIDO

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];
}