<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DevotionalController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'feeling' => 'required|string|max:255',
            'reason' => 'required|string|max:1000',
        ]);

        // Prompt diperbarui dengan instruksi penutup wajib
        $prompt = "Kamu adalah seorang teman dan pembimbing spiritual Kristen yang sangat hangat, berempati, dan penyayang (seperti nuansa cozy Korea). "
                . "Temanku bernama {$request->name} saat ini merasa {$request->feeling} karena {$request->reason}. "
                . "Buatkan sebuah renungan Kristen yang menguatkan, menenangkan, atau ikut bersyukur bersamanya, lengkap dengan SATU ayat Alkitab yang relevan. "
                . "PENTING 1: Seluruh responsmu HARUS dalam bahasa Korea dengan gaya bahasa yang sopan, hangat, dan bersahabat (해요체 - haeyo-che). "
                . "PENTING 2: Di akhir pesan (setelah renungan selesai), kamu WAJIB menambahkan dua kalimat ini persis tanpa diubah: "
                . "\n\n\"만약 여전히 도움이 필요하다면 언제든 인도네시아 친구에게 연락해 주세요. 우리가 함께 기도할 수 있어요. 인도네시아 친구가 항상 당신을 응원하고 있다는 것을 기억해 주세요. 🇮🇩🤝🇰🇷\"";

        try {
            $response = Http::withoutVerifying()->withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.3-70b-versatile',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a warm, cute, and compassionate Christian spiritual friend.'],
                    ['role' => 'user', 'content' => $prompt]
                ],
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $result = $response->json('choices.0.message.content');
                return response()->json(['success' => true, 'data' => $result]);
            }

            return response()->json([
                'success' => false, 
                'message' => 'Groq API Error: ' . $response->body()
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Sistem Error: ' . $e->getMessage()
            ], 500);
        }
    }
}