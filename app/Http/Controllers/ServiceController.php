<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {

        $service_categorys = ServiceCategory::orderBy('name')->with('services')->get();

        return view('service.index', [
            'service_categorys' => $service_categorys,
        ]);
    }

    public function create()
    {
        $service_categorys = ServiceCategory::all();

        return view('service.create', [
            'service_categorys' => $service_categorys,
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'service_category_id' => ['required'],
            'name' => ['required','min:3','max:255'],
            'description' => ['required','min:3','max:32'],
            'url' => ['required','min:10','max:255', 'url'],
            'image' => ['required'],
        ]);

        $service = Service::create($validated);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');


            $service->update([
                'image' => $imagePath,
            ]);


        }


        return redirect(route('service.index'))->withSuccess('Gespeichert!');
    }

    public function edit(Service $service)
    {
        $service_categorys = ServiceCategory::all();

        return view('service.edit', [
            'service' => $service,
            'service_categorys' => $service_categorys,
        ]);
    }

    public function update(Service $service, Request $request)
    {
        $validated = $request->validate([
            'service_category_id' => ['required'],
            'name' => ['required','min:3','max:255'],
            'description' => ['required','min:3','max:32'],
            'url' => ['required','min:10','max:255', 'url'],
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($service->image);

            $imagePath = $request->file('image')->store('services', 'public');

            $service->update(['image' => $imagePath]);

        }

        $service->update($validated);

        return redirect(route('service.index'))->withSuccess('Gespeichert!');
    }

    public function destroy(Service $service)
    {
        Storage::disk('public')->delete($service->image);

        $service->delete();

        return redirect()->route('service.index')->withSuccess('Gelöscht!');
    }
}
