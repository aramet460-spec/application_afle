<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::latest()->get();

        return view('admin.actualites.index', compact('actualites'));
    }

    public function create()
    {
        return view('admin.actualites.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'titre' => ['required', 'string', 'max:200'],
        'type' => ['required', 'in:actualite,evenement'],
        'contenu' => ['required', 'string'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('actualites', 'public');
    }

    Actualite::create($data);

    return redirect()->route('admin.actualites.index')->with('success', 'Publication enregistrée.');
}

    public function destroy(Actualite $actualite)
    {
        $actualite->delete();

        return back()->with('success', 'Actualité supprimée.');
    }
}