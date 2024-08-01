<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Hobby;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murid = Murid::with('hobbies')->get();
        return view('murid.index', compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $hobbies = Hobby::all();
       return view('murid.create', compact('hobbies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $murid = new Murid();
        $murid->nama_murid = $request->input('nama_murid');
        $murid->save();
        
        $hobby_id = $request->input('hobi');
        $murid->hobbies()->sync($hobby_id);

        return redirect()->route('murid.index')->with('success', 'Data Murid Telah Ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $murid = Murid::find($id);
        $hobbies = Hobby::all();
        return view('murid.edit', compact('murid', 'hobbies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $murid = Murid::with('hobbies')->find($id);
        $murid->nama_murid = $request->input('nama_murid');
        $murid->save();
        
        $hobby_id = $request->input('hobi');
        $murid->hobbies()->sync($hobby_id);

        return redirect()->route('murid.index')->with('success', 'Data Murid telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $murid = Murid::find($id);
        $murid->delete();
        return redirect()->route('murid.index')->with('success', 'Data Murid telah dihapus');
    }

    public function softdelete(string $id)
    {
        $murid = Murid::find($id);
        $murid->delete();
        return redirect()->route('murid.index')->with('success', 'Data Murid telah dihapus sementara');
    }

    public function history()
    {
        $murid = Murid::onlyTrashed()->get();
        return view('murid.history', compact('murid'));
    }

    public function restore(string $id)
    {
        $murid = Murid::withTrashed()->find($id);
        $murid->restore();
        return redirect()->route('murid.index')->with('success', 'Data Murid telah dikembalikan');
    }

    public function forceDelete(string $id)
    {
        $murid = Murid::withTrashed()->find($id);
        $murid->forceDelete();
        return redirect()->route('murid.index')->with('success', 'Data Murid telah dihapus permanen');
    }
}
