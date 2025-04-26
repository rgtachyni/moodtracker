<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class formjurnalController extends Controller
{
    public function index()
    {
        $jurnals = Mood::all();
        return view('jwelcome', compact('jurnals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'waktu' => 'required|date',
            'mood' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        Mood::create($request->all());

        return redirect()->back()->with('success', 'Data jurnal berhasil disimpan!');
    }
}
