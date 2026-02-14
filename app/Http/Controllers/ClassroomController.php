<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::latest()->paginate(10);
        return view('classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'level' => 'required|string|max:4',
        ]);

        Classroom::create($request->only(['name', 'level']));
        return redirect()->route('classroom.index')
            ->with('success', 'Classroom created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classroom.show', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classroom.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'level' => 'required|string|max:4',
        ]);

        Classroom::find($id)->update($request->only(['name', 'level']));
        return redirect()->route('classroom.index')
            ->with('success', 'Classroom updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::findOrFail($id);

    // Hapus semua siswa di kelas ini dulu
    $classroom->students()->delete();

    // Baru hapus kelasnya
    $classroom->delete();

    return redirect()->route('classroom.index')
        ->with('success', 'Classroom & students deleted successfully.');
    }
}
