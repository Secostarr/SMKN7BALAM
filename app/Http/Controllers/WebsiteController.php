<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\News; // Wajib dipanggil biar modelnya kebaca

class WebsiteController extends Controller
{
    public function index()
    {
        // Ambil data testimonials dari database (misal nampilin 3 yang terbaru)
        $testimonials = Testimonial::latest()->take(3)->get();
        $news = News::latest()->take(3)->get();
        
        // Kirim variabel $testimonials ke file index.blade.php
        return view('index', compact('testimonials', 'news'));
    }
}