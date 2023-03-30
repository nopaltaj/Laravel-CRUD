<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $siswa = Siswa::all();

        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|unique:siswas,phone',
            'nim'   => 'required|unique:siswas,nim'
        ]);

        $siswa = Siswa::create([
            'phone' => $request->phone,
            'name' => $request->name,
            'city' => $request->city,
            'nim' => $request->nim,
        ]);

        if ($siswa) {
            return redirect()->route('siswa.index')->with([
                Alert::success(
                    'Success',
                    'Berhasil Menambah Siswa'
                )
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        $this->validate($request, [
            'phone' => 'unique:siswas,phone,' . $siswa->id,
            'nim' => 'unique:siswas,nim,' . $siswa->id
        ]);

        $siswa = Siswa::findOrFail($siswa->id);

        $siswa->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'nim' => $request->nim
        ]);

        return redirect()->route('siswa.index')->with([
            Alert::success('Succes', 'Berhasil diupdate')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with([
            Alert::success(
                'Success',
                'Berhasil Menghapus Siswa'
            )
        ]);
    }
}
