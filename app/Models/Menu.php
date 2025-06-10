<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_text',
        'menu_icon',
        'menu_url',
        'menu_order',
        'status'
    ];

    protected $casts = [
        'menu_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Scope untuk mendapatkan menu aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk mengurutkan berdasarkan menu_order
    public function scopeOrdered($query)
    {
        return $query->orderBy('menu_order', 'asc');
    }
}
