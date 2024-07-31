<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobby;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function hobby()
    {
        $hobbies = Hobby::all();
        return view('hobby.hobby', compact('hobbies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hobby.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_hobi' => 'required'
        ]);

        Hobby::create([
            'nama_hobi' => $request->nama_hobi
        ]);

        return redirect()->route('hobby.hobby')->with('success', 'Hobi telah ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('hobby.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hobbies = Hobby::find($id);
        return view('hobby.hobby', compact('hobbies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'nama_hobi' => 'required'
       ]);

       $hobbies = Hobby::find($id);
       $hobbies->nama_hobi = $request->nama_hobi;
       $hobbies->save();

       return redirect()->route('hobby.hobby')->with('success', 'hobby updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Hobby::find($id)->delete();
        return redirect()->route('hobby.hobby')->with('success', 'hobby deleted successfully');
    }
}
