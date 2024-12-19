<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Method untuk menampilkan view dashboard
    public function index()
    {
        return view('dashboard');
    }

    public function show(request $request){

        $user = $request->user();
        return response()->json([
            'message' => 'selamat datang didashboard',
            'user' => $user,], 201);
    }

}

