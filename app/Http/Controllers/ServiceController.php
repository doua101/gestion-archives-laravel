<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Division;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('division')->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $divisions = Division::all();
        return view('services.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_service' => 'required',
            'division_id' => 'required'
        ]);
        Service::create($request->all());
        return redirect()->route('services.index');
    }

    public function edit(Service $service)
    {
        $divisions = Division::all();
        return view('services.edit', compact('service', 'divisions'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nom_service' => 'required',
            'division_id' => 'required'
        ]);
        $service->update($request->all());
        return redirect()->route('services.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }
}