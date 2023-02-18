<?php

namespace App\Http\Controllers;

use App\Models\UTM;
use Illuminate\Http\Request;

class UTMController extends Controller
{
    public function index()
    {
        return view('utm.index');
    }

    public function create()
    {
        return view('utm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer' => ['required','min:3','max:255'],
            'location' => ['required','min:3','max:255'],
            'url' => ['required','min:20','max:255', 'url'],
        ]);


        UTM::create($validated);

        return redirect(route('utm.index'))->withSuccess('Gespeichert!');
    }

    public function edit(UTM $utm)
    {
        return view('utm.edit', [
            'utm' => $utm,
        ]);
    }

    public function update(UTM $utm, Request $request)
    {
        $validated = $request->validate([
            'customer' => ['required','min:3','max:255'],
            'location' => ['required','min:3','max:255'],
            'url' => ['required','min:20','max:255', 'url'],
        ]);


        $utm->update($validated);

        return redirect(route('utm.index'))->withSuccess('Gespeichert!');
    }

    public function destroy(UTM $utm)
    {
        $utm->delete();

        return redirect()->route('utm.index')->withSuccess('Gelöscht!');
    }
}
