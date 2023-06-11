@extends('layouts.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
            <a href="{{route('dataatlet.create')}}" class="btn btn-primary float-right"><i class="fas fa-fw fa-plus-circle"></i>Tambah Data</a>
        <h5 class="m-0 font-weight-bold text-primary">data Atlet</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>tanggallahir</th>
                        <th>Sekolah/Universitas/Instansi</th>
                        <th>Prestasi</th>
                        {{-- <th>Gambar prestasi</th> --}}
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($dataatlet as $key=>$item)

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$item->nama}}</td>                        
                        <td>
                            <div class="container">
                                <a href="{{ route('dataatlet.edit', $item->id ) }}" class="btn bg-gradient-success btn-sm text-white"><i class="fas fa-fw fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>@endsection