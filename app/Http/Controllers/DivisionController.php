<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        return view('divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom_division' => 'required']);
        Division::create($request->all());
        return redirect()->route('divisions.index');
    }

    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $request->validate(['nom_division' => 'required']);
        $division->update($request->all());
        return redirect()->route('divisions.index');
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('divisions.index');
    }

    public function show(Division $division)
    {
        return view('divisions.show', compact('division'));
    }
}