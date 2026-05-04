<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);
        
        // Siin saad saata e-kirja (vajad Mailtrapi vms)
        // Praegu lihtsalt salvestame sessiooni
        
        return back()->with('success', 'Sõnum saadetud! Võtan ühendust niipea kui võimalik.');
    }
}