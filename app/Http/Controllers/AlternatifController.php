<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = alternatif::orderby('nama', 'asc')->get();
        return view('admin.alternatif.index', compact('alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alternatif.create');
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
            'nama' => 'required'
        ]);

        $alternatif = alternatif::create([
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('success','Data berhasil disimpan');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = alternatif::findorfail($id);
        return view('admin.alternatif.edit', compact('alternatif'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $alternatif = [
            'nama' => $request->nama
        ];

        alternatif::whereId($id)->update($alternatif);

        return redirect()->route('alternatif.index')->with('success','Data Berhasil di Update');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = alternatif::findorfail($id);
        $alternatif->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');    }
}
