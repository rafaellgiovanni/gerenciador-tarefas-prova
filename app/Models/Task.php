<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'user_id' // Certifique-se de que esta linha está aqui
    ];

    /**
     * Get the user that owns the Task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}