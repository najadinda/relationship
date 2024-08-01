<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Nis;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('nis')->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Student::create([
            'nama' => $request->nama
        ]);
        $nis = new Nis(['nis' => $request->nis]);
        $student->nis()->save($nis);

        return redirect()->route('student.index')->with('success', 'Data telah ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return view('student.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::with('nis')->find($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->update([
            'nama' => $request->nama
        ]);

        if ($student->nis) {
            $student->nis->update(['nis' => $request->nis]);
        } else {
            $nis = new Nis(['nis' => $request->nis]);
            $student->nis()->save($nis);
        }
        return redirect()->route('student.index')->with('success', 'Data telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::withTrashed()->find($id);
        $student->delete();
        return redirect()->route('student.index');
    }

    public function softdelete(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Data telah dihapus sementara');
    }

    public function history()
    {
        $students = Student::onlyTrashed()->get();
        return view('student.history', compact('students'));
    }

    public function restore(string $id)
    {
        $student = Student::onlyTrashed()->find($id);
        $student->restore();
        return redirect()->route('student.index')->with('success', 'Data siswa berhasil dikembalikan!');
    }

    public function forceDelete(string $id)
    {
        $student = Student::onlyTrashed()->find($id);
        $student->forceDelete();

        return redirect()->route('student.index')->with('success', 'Data telah dihapus permanen');
    }
}
