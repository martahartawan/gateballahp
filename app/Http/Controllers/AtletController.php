<?php

namespace App\Http\Controllers;
use App\Models\Atlet;
use Illuminate\Http\Request;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atlet = atlet::orderby('nama', 'asc')->get();
        return view('admin.atlet.index', compact('atlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.atlet.index');
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

        $atlet = atlet::create([
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
        $atlet = atlet::findorfail($id);
        return view('admin.atlet.edit', compact('atlet'));      
    }

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

        $atlet = [
            'nama' => $request->nama
        ];

        atlet::whereId($id)->update($atlet);

        return redirect()->route('atlet.index')->with('success','Data Berhasil di Update');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atlet = atlet::findorfail($id);
        $atlet->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');      }
}
