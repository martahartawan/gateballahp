<?php

namespace App\Http\Controllers;
use App\Models\DataAtlet;
use Illuminate\Http\Request;

class DataAtletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataatlet = dataatlet::orderby('nama', 'asc')->get();
        return view('admin.dataatlet.index', compact('dataatlet'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dataatlet.index');
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
            'nama' => 'required',
            'umur' => 'required',
            'tanggallahir' => 'required',
            'sekolah' => 'required',
            'prestasi' => 'required',
            // 'gambarprestasi' => 'required'
        ]);

        $dataatlet = dataatlet::create([
            'nama' => $request->nama,
        ]);
        $dataatlet = dataatlet::create([
            'umur' => $request->umur,
        ]);
        $dataatlet = dataatlet::create([
            'tanggallahir' => $request->tanggallahir,
        ]);
        $dataatlet = dataatlet::create([
            'sekolah' => $request->sekolah,
        ]);
        $dataatlet = dataatlet::create([
            'prestasi' => $request->prestasi,
        ]);
        // $dataatlet = dataatlet::create([
        //     'gambarprestasi' => $request->gambarprestasi,
        // ]);

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
        $dataatlet = dataatlet::findorfail($id);
        return view('admin.dataatlet.edit', compact('dataatlet'));        }

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
            'nama' => 'required',
            'umur' => 'required',
            'tanggallahir' => 'required',
            'sekolah' => 'required',
            'prestasi' => 'required',
            // 'gambarprestasi' => 'required'
        ]);

        $dataatlet = [
            'nama' => $request->nama
        ];
        $dataatlet = [
            'umur' => $request->umur
        ];
        $dataatlet = [
            'tanggallahir' => $request->tanggallahir
        ];
        $dataatlet = [
            'sekolah' => $request->sekolah
        ];
        $dataatlet = [
            'prestasi' => $request->prestasi
        ];
        // $dataatlet = [
        //     'gambarprestasi' => $request->gambarprestasi
        // ];

        dataatlet::whereId($id)->update($dataatlet);

        return redirect()->route('dataatlet.index')->with('success','Data Berhasil di Update');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataatlet = dataatlet::findorfail($id);
        $dataatlet->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');      }
}
