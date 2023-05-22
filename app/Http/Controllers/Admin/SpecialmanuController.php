<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialmanu;

class SpecialmanuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialmanuse = Specialmanu::all();
        return view('admin.specialmanu.index', compact('specialmanuse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.specialmanu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $specialmanu = new Specialmanu;
        $specialmanu->name = $request->name;
        $specialmanu->slug = str_slug($request->name);
        $specialmanu->save();

        return redirect()->route('specialmanu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specialmanu = Specialmanu::find($id);
        return view('admin.specialmanu.edit', compact('specialmanu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $specialmanu = Specialmanu::find($id);
        $specialmanu->name = $request->name;
        $specialmanu->slug = str_slug($request->name);
        $specialmanu->save();

        return redirect()->route('specialmanu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Specialmanu::find($id)->delete();
        return redirect()->route('specialmanu.index');
    }
}
