<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevotionalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Endpoint Obat Hati AI
Route::post('/generate-devotional', [DevotionalController::class, 'generate'])->name('generate.devotional');

// Endpoint Menyimpan Kuisioner
Route::post('/submit-kuisioner', function (Request $request) {
    $data = [
        'tanggal' => now()->timezone('Asia/Jakarta')->format('d M Y - H:i'),
        'nama' => $request->nama,
        'senang' => $request->senang,
        'menarik' => $request->menarik,
    ];
    
    // Simpan data ke dalam file pesan.json
    $existing = Storage::get('pesan.json');
    $pesan = $existing ? json_decode($existing, true) : [];
    $pesan[] = $data;
    Storage::put('pesan.json', json_encode($pesan, JSON_PRETTY_PRINT));
    
    return response()->json(['success' => true]);
})->name('submit.kuisioner');

// Halaman Rahasia untuk Richardo Melihat Jawaban
Route::get('/lihat-kuisioner', function () {
    $existing = Storage::get('pesan.json');
    $pesan = $existing ? json_decode($existing, true) : [];
    $pesan = array_reverse($pesan); // Urutkan dari yang terbaru
    
    $html = "<h1 style='font-family:sans-serif; text-align:center; color:#ec4899; margin-top:30px;'>💌 Pesan dari Teman Korea 💌</h1>";
    $html .= "<div style='display:flex; flex-direction:column; gap:20px; max-width:800px; margin:0 auto; padding:20px; font-family:sans-serif;'>";
    
    if(empty($pesan)) return $html . "<p style='text-align:center;'>Belum ada yang mengisi kuisioner.</p></div>";

    foreach($pesan as $p) {
        $html .= "<div style='background:#fdf2f8; padding:20px; border-radius:15px; border:2px solid #fbcfe8;'>";
        $html .= "<b>Nama:</b> {$p['nama']} <span style='color:gray; font-size:12px; float:right;'>{$p['tanggal']}</span><br><br>";
        $html .= "<b>Yang buat senang:</b><br>{$p['senang']}<br><br>";
        $html .= "<b>Hal yang sulit dilupakan:</b><br>{$p['menarik']}";
        $html .= "</div>";
    }
    return $html . "</div>";
});