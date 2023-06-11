{{-- @extends('layouts.master')
@section('content')
<form method="POST" action="/proses-perbandingan">
    @csrf
    <table class="ui celled selectable collapsing table">
        <thead>
            <tr>
                <th colspan="2">Pilih yang lebih penting</th>
                <th>Nilai perbandingan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $alternatifCount = count($alternatif);
            for ($i = 0; $i < $alternatifCount; $i++) {
                for ($j = $i + 1; $j < $alternatifCount; $j++) {
                    $alternatif1 = $alternatif[$i];
                    $alternatif2 = $alternatif[$j];
            ?>
            <tr>
                <td>
                    <div class="field">
                        <div class="ui radio checkbox checked">
                            <input name="pilih{{ $alternatif1->id }}{{ $alternatif2->id }}" value="1" checked class="hidden" type="radio" tabindex="0">
                            <label>{{ $alternatif1->nama }}</label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input name="pilih{{ $alternatif1->id }}{{ $alternatif2->id }}" value="2" class="hidden" type="radio" tabindex="0">
                            <label>{{ $alternatif2->nama }}</label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="field">
                        <input type="text" name="bobot{{ $alternatif1->id }}{{ $alternatif2->id }}" value="1" required>
                    </div>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <button type="submit" class="ui primary button">Submit</button>
</form>

<script>
    // Menambahkan event listener pada saat form di-submit
    document.querySelector('form').addEventListener('submit', function(event) {
        // Mendapatkan semua inputan bobot
        var bobotInputs = document.querySelectorAll('input[name^="bobot"]');
        
        // Mengecek setiap inputan bobot
        for (var i = 0; i < bobotInputs.length; i++) {
            var bobotInput = bobotInputs[i];
            var bobotValue = bobotInput.value;
            
            // Memeriksa apakah inputan bukan angka atau tidak berada dalam rentang 1-9
            if (!/^[1-9]$/.test(bobotValue)) {
                // Menghentikan pengiriman form
                event.preventDefault();
                
                // Menampilkan pesan kesalahan
                alert('Inputan bobot harus berupa angka dari 1 hingga 9.');
                
                // Fokus pada inputan yang tidak valid
                bobotInput.focus();
                
                // Keluar dari loop (hanya menampilkan satu pesan kesalahan)
                break;
            }
        }
    });
</script>

@endsection --}}