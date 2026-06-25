<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial; // Wajib dipanggil biar bisa ngobrol sama database

class TestimonialController extends Controller
{
    /**
     * Nampilin halaman utama (tabel testimoni)
     */
    public function index()
    {
        $testimonial = Testimonial::latest()->paginate(10);
        return view('dashboard.Testimonials.index', compact('testimonial'));
    }

    /**
     * Nampilin form buat nambah testimoni baru
     */
    public function create()
    {
        return view('dashboard.Testimonials.create');
    }

    /**
     * Nyimpen data dari form tambah ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('dashboard.testimonials.index')
                         ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Fitur show biasanya gak kepake di dashboard sederhana, kita lewatin aja.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Nampilin form buat ngedit data
     */
    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    /**
     * Nyimpen perubahan data dari form edit ke database
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $testimonial->update($request->all());

        return redirect()->route('dashboard.testimonials.index')
                         ->with('success', 'Testimoni berhasil diperbarui!');
    }

    /**
     * Ngapus data dari database
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('dashboard.testimonials.index')
                         ->with('success', 'Testimoni berhasil dihapus!');
    }
}