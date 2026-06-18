<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // Tambahin baris ini buat ngasih izin kolom mana aja yang boleh diisi data
    protected $fillable = [
        'name', 
        'role', 
        'content'
    ];
}