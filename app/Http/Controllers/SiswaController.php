<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::with('jurusan')->get();
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('siswa.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'jurusan_id' => 'required',
        ]);

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'jurusan_id' => $request->jurusan_id,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa jurusan telah ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::find($id);
        $jurusan = Jurusan::all();
        return view('siswa.edit', compact('siswa', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'jurusan_id' => 'required|string|max:255',
        ]);
    
        $siswa = Siswa::findOrFail($id);
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->save();
        
        return redirect()->route('siswa.index')->with('success', 'Data siswa jurusan telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa jurusan telah dihapus');
    }

    public function softdelete(string $id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa jurusan telah dihapus sementara');
    }

    public function history()
    {
        $siswa = Siswa::onlyTrashed()->get();
        return view('siswa.history', compact('siswa'));
    }

    public function restore(string $id)
    {
        $siswa = Siswa::onlyTrashed()->find($id);
        $siswa->restore();
        return redirect()->route('siswa.index')->with('success', 'Data siswa jurusan berhasil dikembalikan');
    }
   
    public function forceDelete(string $id)
    {
        $siswa = Siswa::onlyTrashed()->find($id);
        $siswa->forceDelete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa jurusan telah dihapus permanen');
    }
}
