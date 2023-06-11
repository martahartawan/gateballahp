<?php

namespace App\Http\Controllers;

use App\Models\PerbandinganKriteria;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerbandinganKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all()->count();
        return view('admin.perbandingankriteria.index', compact('kriteria'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();

        return view('admin.perbandingankriteria.create', compact('kriteria'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kriteria = Kriteria::all();

    // Simpan perbandingan kriteria ke database
    foreach ($kriteria as $kriteria1) {
        foreach ($kriteria as $kriteria2) {
            if ($kriteria1->id < $kriteria2->id) {
                $nilai = $request->input('bobot' . $kriteria1->id . $kriteria2->id);

                PerbandinganKriteria::create([
                    'kriteria_id1' => $kriteria1->id,
                    'kriteria_id2' => $kriteria2->id,
                    'nilai' => $nilai,
                ]);
            }
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hitungPerbandingan()
    {
    $kriteria = Kriteria::all();
    $matriksPerbandingan = $this->hitungMatriksPerbandingan($kriteria);
    $matriksNormalisasi = $this->hitungMatriksNormalisasi($matriksPerbandingan);
    $vektorPrioritas = $this->hitungVektorPrioritas($matriksNormalisasi);
    $konsistensiRatio = $this->hitungKonsistensiRatio($matriksPerbandingan, $vektorPrioritas);

    return view('perbandingan-kriteria.hasil', compact('kriteria', 'matriksPerbandingan', 'matriksNormalisasi', 'vektorPrioritas', 'konsistensiRatio'));
    }

    private function hitungMatriksPerbandingan($kriteria)
    {
    $kriteriaCount = count($kriteria);
    $matriksPerbandingan = [];

    for ($i = 0; $i < $kriteriaCount; $i++) {
        $matriksPerbandingan[$i] = [];
        for ($j = 0; $j < $kriteriaCount; $j++) {
            $kriteria1 = $kriteria[$i];
            $kriteria2 = $kriteria[$j];
            // Misalnya, bobot perbandingan kriteria disimpan di dalam model PerbandinganKriteria
            $nilai = PerbandinganKriteria::where('kriteria_id1', $kriteria1->id)
                ->where('kriteria_id2', $kriteria2->id)
                ->value('nilai');
            $matriksPerbandingan[$i][$j] = $nilai;
        }
    }

    return $matriksPerbandingan;
    }

    private function hitungMatriksNormalisasi($matriksPerbandingan)
    {
    $kriteriaCount = count($matriksPerbandingan);
    $matriksNormalisasi = [];

    for ($i = 0; $i < $kriteriaCount; $i++) {
        $sum = array_sum($matriksPerbandingan[$i]);
        $matriksNormalisasi[$i] = [];
        for ($j = 0; $j < $kriteriaCount; $j++) {
            $matriksNormalisasi[$i][$j] = $matriksPerbandingan[$i][$j] / $sum;
        }
    }

    return $matriksNormalisasi;
    }

    private function hitungVektorPrioritas($matriksNormalisasi)
    {
    $kriteriaCount = count($matriksNormalisasi);
    $vektorPrioritas = [];

    for ($i = 0; $i < $kriteriaCount; $i++) {
        $sum = 0;
        for ($j = 0; $j < $kriteriaCount; $j++) {
            $sum += $matriksNormalisasi[$j][$i];
        }
        $vektorPrioritas[$i] = $sum / $kriteriaCount;
    }

    return $vektorPrioritas;
    }

    private function hitungKonsistensiRatio($matriksPerbandingan, $vektorPrioritas)
    {
    $kriteriaCount = count($matriksPerbandingan);
    $lambdaMax = 0;
    $ci = 0;
    $ri = [0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49];

    // Menghitung nilai Lambda Max
    for ($i = 0; $i < $kriteriaCount; $i++) {
        $sum = 0;
        for ($j = 0; $j < $kriteriaCount; $j++) {
            $sum += $matriksPerbandingan[$i][$j] * $vektorPrioritas[$j];
        }
        $lambdaMax += $sum * $vektorPrioritas[$i];
    }

    // Menghitung Consistency Index (CI)
    $ci = ($lambdaMax - $kriteriaCount) / ($kriteriaCount - 1);

    // Menghitung Consistency Ratio (CR)
    $cr = $ci / $ri[$kriteriaCount - 1];

    return $cr;
    }
}
