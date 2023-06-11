{{-- @extends('layouts.master')

@section('content')
    <form method="POST" action="{{ route('perbandingan.store') }}">
        @csrf
        <table class="ui celled selectable collapsing table">
            <thead>
                <tr>
                    <th colspan="2">Pilih yang lebih penting</th>
                    <th>Nilai perbandingan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria as $kriteria1)
                    @foreach ($kriteria as $kriteria2)
                        @if ($kriteria1->id != $kriteria2->id)
                            <tr>
                                <td>
                                    <div class="field">
                                        <div class="ui radio checkbox checked">
                                            <input name="pilih[{{ $kriteria1->id }}][{{ $kriteria2->id }}]" value="1" checked class="hidden" type="radio" tabindex="0">
                                            <label>{{ $kriteria1->nama }}</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input name="pilih[{{ $kriteria1->id }}][{{ $kriteria2->id }}]" value="2" class="hidden" type="radio" tabindex="0">
                                            <label>{{ $kriteria2->nama }}</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="field">
                                        <input type="text" name="bobot[{{ $kriteria1->id }}][{{ $kriteria2->id }}]" value="1" required>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="ui primary button">Submit</button>
    </form>
@endsection --}}
