<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Kirim email ke email sekolah lu
        Mail::raw("Dari: {$data['name']} ({$data['email']})\n\nPesan:\n{$data['message']}", function ($msg) use ($data) {
            $msg->to('smkn7bandarlampung@yahoo.co.id')
                ->subject('Pesan Baru: ' . $data['subject']);
        });

        return back()->with('success', 'Pesan berhasil terkirim!');
    }
}