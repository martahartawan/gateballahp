@extends('layouts.master')

@section('content')
    <h1>Hasil Perbandingan Kriteria</h1>
    <form method="POST" action="{{ route('perbandingankriteria.store') }}">
        @csrf
    <h3>Matriks Perbandingan</h3>
    <table>
        <thead>
            <tr>
                <th></th>
                @foreach ($kriteria as $kriteria)
                    <th>{{ $kriteria->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($matriksPerbandingan as $key => $row)
                <tr>
                    <th>{{ $kriteria[$key]->nama }}</th>
                    @foreach ($row as $nilai)
                        <td>{{ $nilai }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Matriks Normalisasi</h3>
    <table>
        <thead>
            <tr>
                <th></th>
                @foreach ($kriteria as $kriteria)
                    <th>{{ $kriteria->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($matriksNormalisasi as $key => $row)
                <tr>
                    <th>{{ $kriteria[$key]->nama }}</th>
                    @foreach ($row as $nilai)
                        <td>{{ $nilai }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Vektor Prioritas</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Kriteria</th>
                <th>Vektor Prioritas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vektorPrioritas as $key => $nilai)
                <tr>
                    <td>{{ $kriteria[$key]->nama }}</td>
                    <td>{{ $nilai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Konsistensi Ratio</h3>
    <p>Nilai Konsistensi Ratio: {{ $konsistensiRatio }}</p>

    <h3>Bobot Kriteria</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $kriteria)
                <tr>
                    <td>{{ $kriteria->nama }}</td>
                    <td>{{ $kriteria->bobot }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </form>

    <!-- Tambahkan tampilan lain yang diperlukan untuk hasil perhitungan -->
@endsection
