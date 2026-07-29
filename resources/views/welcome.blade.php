<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>한국 친구들을 위한 편지 💌</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Jua&family=Nunito:wght@400;600;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    
    <style>
        body {
            font-family: 'Nunito', 'Jua', sans-serif;
            background-color: #ffffff;
            background-image: radial-gradient(#ffb6c1 2px, transparent 2px);
            background-size: 40px 40px;
            cursor: url('https://cdn-icons-png.flaticon.com/32/1828/1828884.png'), auto;
            overflow-x: hidden;
            position: relative;
        }

        /* ----- SNOW ANIMATION (LEBIH LEBAT & GLOWING) ----- */
        .snow-container {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            pointer-events: none; z-index: 9999;
        }
        .snowflake {
            position: absolute; top: -10vh;
            color: #f35e50; 
            /* Memberikan efek cahaya pink lembut agar terlihat jelas di latar terang */
            text-shadow: 0 0 8px rgba(24, 20, 21, 0.8), 0 0 15px rgba(255, 255, 255, 1);
            animation: fall linear infinite;
        }
        @keyframes fall {
            0% { transform: translateY(-10vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(110vh) rotate(360deg); opacity: 0.5; }
        }

        /* ----- ANIMASI KEJAR-KEJARAN (TIKUS, KUCING, PORORO) ----- */
        .chase-wrapper {
            position: fixed;
            bottom: 10px;
            z-index: 9998;
            pointer-events: none;
            display: flex;
            align-items: flex-end; /* Memastikan kaki mereka rata di bawah */
            gap: 10px; /* Jarak antara mereka */
            animation: runChase 12s linear infinite; /* Kecepatan lari */
        }
        @keyframes runChase {
            0% { left: -400px; transform: scaleX(1); }
            45% { left: 100vw; transform: scaleX(1); }
            50% { left: 100vw; transform: scaleX(-1); }
            95% { left: -400px; transform: scaleX(-1); }
            100% { left: -400px; transform: scaleX(1); }
        }

        /* Existing Styles */
        .kawaii-card {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(5px);
            border: 4px solid #885f6a;
            border-radius: 30px;
            box-shadow: 8px 8px 0px 0px #ffb3c6;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .kawaii-card:hover { transform: translate(-4px, -4px) rotate(-1deg); box-shadow: 12px 12px 0px 0px #ffb3c6; }
        .kawaii-input { background-color: #fff0f3; border: 3px solid #ffb3c6; border-radius: 20px; transition: all 0.2s; }
        .kawaii-input:focus { outline: none; border-color: #ff8fab; background-color: white; box-shadow: 0px 0px 0px 4px rgba(255, 143, 171, 0.3); transform: scale(1.02); }
        .kawaii-btn { background-color: #ff8fab; color: white; border: 3px solid #ff4d6d; box-shadow: 4px 4px 0px 0px #ff4d6d; transition: all 0.2s; }
        .kawaii-btn:active { transform: translate(4px, 4px); box-shadow: 0px 0px 0px 0px #ff4d6d; }
        .hover-jiggle:hover { animation: jiggle 0.4s ease-in-out infinite; }
        @keyframes jiggle { 0%, 100% { transform: rotate(0deg); } 25%, 75% { transform: rotate(-5deg); } 50% { transform: rotate(5deg); } }
        .hide-scrollbar::-webkit-scrollbar { display: none; } .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="min-h-screen text-gray-800 flex flex-col items-center py-12 px-4 relative">

    <!-- Container Salju -->
    <div class="snow-container" id="snowContainer"></div>

    <!-- Animasi Kejar-kejaran (Tikus -> Kucing -> Pororo) -->
    <div class="chase-wrapper">
        <!-- Tikus Lari -->
        <img src="https://media.tenor.com/L_N8v7DPM8QAAAAi/jerry-run.gif" class="w-12 h-12 mb-1" alt="Mouse Running">
        <!-- Kucing Lari -->
        <img src="https://media.tenor.com/vHqB0y5Xg7QAAAAi/tom-running.gif" class="w-20 h-20" alt="Cat Running">
        <!-- Pororo Mengejar -->
        <img src="https://media.tenor.com/2s_1z7eGstMAAAAi/pororo.gif" class="w-24 h-24" alt="Pororo Walking">
    </div>

    <main class="max-w-4xl w-full flex flex-col gap-12 z-10 relative">

        <!-- 💌 Surat -->
        <section class="kawaii-card p-8 md:p-14 relative mt-10">
            <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 bg-yellow-200 w-32 h-10 shadow-sm border-2 border-yellow-400 rotate-2 opacity-90"></div>
            <div class="text-center mb-8 relative">
                <span class="inline-block bg-white border-2 border-pink-400 text-pink-500 font-bold px-6 py-2 rounded-full text-sm shadow-[3px_3px_0px_0px_#f9a8d4] hover-jiggle cursor-pointer">
                    ✨ 리카르도가 한국 친구들에게 ✨
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-center text-pink-500 mb-10 tracking-tight" style="text-shadow: 2px 2px 0px #fbcfe8;">
                나의 한국 친구들에게 💖
            </h1>
            <div class="space-y-6 text-xl leading-relaxed text-gray-700 font-medium">
                <p>한국 친구들 안녕하세요, 솔로(Solo)를 다시 방문해 주셔서 정말 고마워요. 인도네시아에 여러분의 친구가 있다는 사실을 절대 잊지 마세요! 나중에 돈 많이 모으면 저희가 그곳으로 놀러 갈게요 ㅎㅎ. 휴~ 한국처럼 월급은 많이 받으면서 인도네시아처럼 물가가 저렴하다면 얼마나 좋을까요 ㅋㅋㅋ.</p>
                <p>한국에 친구가 있다는 건 정말 신기하고 멋진 일이에요. 흠, 무슨 말을 더 해야 할지 모르겠지만, 분명한 건 여러분을 다시 만나고 <strong class="text-pink-600 bg-pink-100 px-3 py-1 rounded-xl border-2 border-pink-300 transform inline-block -rotate-1 hover-jiggle">로사 누나</strong> 같은 새로운 한국 친구를 만나게 되어 정말 기쁘다는 거예요. 비록 예전에 인도네시아에 같이 왔었던 박시온, 호근, 현주, 서욱이 등 다른 친구들을 이번엔 보지 못해서 좀 슬프기도 했지만요.</p>
                <p>그나저나 저 정말 운이 없나 봐요. 태영이랑 단둘이 사진 찍는 걸 깜빡했어요. 태영이는 항상 너무 귀여운 것 같아요 ㅋㅋ.</p>
                
                <div class="my-10 relative bg-yellow-50 rounded-3xl p-8 text-center border-4 border-yellow-300 shadow-[6px_6px_0px_0px_#fde047] transform hover:scale-[1.01] transition-transform">
                    <img src="https://media.tenor.com/b_H_w4V0iJUAAAAi/mochi-peach-cat-cute.gif" class="absolute -top-12 -left-8 w-20 h-20" alt="Cute Cat">
                    <p class="font-black text-yellow-600 mb-3 text-2xl">📖 요한복음 13장 15절</p>
                    <p class="text-2xl font-bold text-gray-800 leading-snug">"내가 너희에게 행한 것 같이 너희도 행하게 하려 하여 본을 보였노라"</p>
                </div>

                <p>여러분도 주변 사람들에게 항상 본보기가 되고, 어둠 속에서 빛이 되기를 바라요.</p>
                <div class="text-center mt-12 mb-4">
                    <p class="font-black text-white bg-pink-500 text-3xl md:text-4xl inline-block px-8 py-4 rounded-[40px] border-4 border-pink-700 shadow-[6px_6px_0px_0px_#be185d] hover-jiggle">사랑해요 여러분!!! 🥰</p>
                </div>
                <p class="text-center text-sm text-gray-400 font-bold">* 오해가 없도록 제미나이(Gemini) 번역이 정확하게 잘 되었기를 바랍니다.</p>
            </div>
        </section>

        <!-- 📸 Gallery -->
        <section class="kawaii-card p-8 md:p-12 bg-blue-50/70 border-blue-300 shadow-[8px_8px_0px_0px_#93c5fd]">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-black text-blue-500 flex items-center gap-3">📸 솔로에서의 작은 추억들 ㅋㅋ</h2>
                <div class="flex gap-3">
                    <button onclick="scrollGallery(-1)" class="w-12 h-12 rounded-full bg-white border-4 border-blue-300 text-blue-500 font-black text-xl hover:-translate-y-1 transition-all">←</button>
                    <button onclick="scrollGallery(1)" class="w-12 h-12 rounded-full bg-white border-4 border-blue-300 text-blue-500 font-black text-xl hover:-translate-y-1 transition-all">→</button>
                </div>
            </div>
            
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-6 pb-8 pt-4 hide-scrollbar cursor-grab active:cursor-grabbing" id="imageSlider">
                <img src="{{ asset('IMG-20260721-WA0062.jpg') }}" class="snap-center shrink-0 w-72 h-72 object-cover rounded-3xl border-4 border-white shadow-lg hover:scale-105 hover:rotate-2 transition-transform duration-300" alt="Memory">
                <img src="{{ asset('IMG_20260722_174815_263.jpg') }}" class="snap-center shrink-0 w-72 h-72 object-cover rounded-3xl border-4 border-white shadow-lg hover:scale-105 hover:-rotate-2 transition-transform duration-300" alt="Memory">
                <img src="{{ asset('IMG-20260724-WA0053.jpg') }}" class="snap-center shrink-0 w-72 h-72 object-cover rounded-3xl border-4 border-white shadow-lg hover:scale-105 hover:rotate-2 transition-transform duration-300" alt="Memory">
                <img src="{{ asset('IMG-20260719-WA0011.jpg') }}" class="snap-center shrink-0 w-72 h-72 object-cover rounded-3xl border-4 border-white shadow-lg hover:scale-105 hover:-rotate-2 transition-transform duration-300" alt="Memory">
                <img src="{{ asset('WhatsApp Image 2026-07-30 at 03.55.40.jpeg') }}" class="snap-center shrink-0 w-72 h-72 object-cover rounded-3xl border-4 border-white shadow-lg hover:scale-105 hover:rotate-2 transition-transform duration-300" alt="Memory">
                <img src="{{ asset('WhatsApp Image 2026-07-30 at 03.55.41.jpeg') }}" class="snap-center shrink-0 w-72 h-72 object-cover rounded-3xl border-4 border-white shadow-lg hover:scale-105 hover:-rotate-2 transition-transform duration-300" alt="Memory">
            </div>
        </section>

        <!-- 📝 Kuisioner Aktif -->
        <section class="kawaii-card p-8 md:p-12 relative bg-purple-50/70 border-purple-300 shadow-[8px_8px_0px_0px_#d8b4fe]">
            <img src="https://media.tenor.com/GfSX-u7Vq20AAAAi/peach-cat.gif" class="absolute -top-14 right-4 w-28 h-28" alt="Typing Cat">
            
            <div id="questionnaireContainer">
                <h2 class="text-3xl font-black text-purple-600 mb-2">인도네시아에 대한 여러분의 생각이 궁금해요! 💭</h2>
                <p class="text-purple-500 font-bold mb-8 text-lg">이 질문들에 답해주시겠어요?</p>
                
                <form onsubmit="submitQuestionnaire(event)" id="questionnaireForm" class="space-y-6 relative z-10">
                    @csrf
                    <div>
                        <label class="block text-purple-800 font-bold mb-2 ml-2 text-xl">1. 이름이 뭐예요?</label>
                        <input type="text" id="q_nama" required class="kawaii-input w-full px-6 py-4 text-lg font-bold text-gray-700 placeholder-gray-400" placeholder="이름을 입력해주세요 ✏️">
                    </div>
                    <div>
                        <label class="block text-purple-800 font-bold mb-2 ml-2 text-xl">2. 인도네시아에서 당신을 기쁘게 한 것은 무엇인가요?</label>
                        <textarea id="q_senang" required rows="2" class="kawaii-input w-full px-6 py-4 text-lg font-bold text-gray-700 placeholder-gray-400" placeholder="여기에 적어주세요..."></textarea>
                    </div>
                    <div>
                        <label class="block text-purple-800 font-bold mb-2 ml-2 text-xl">3. 이곳에서 잊기 힘든 흥미로운 일이 있나요?</label>
                        <textarea id="q_menarik" required rows="2" class="kawaii-input w-full px-6 py-4 text-lg font-bold text-gray-700 placeholder-gray-400" placeholder="여기에 적어주세요..."></textarea>
                    </div>
                    
                    <button type="submit" id="btnSubmitKuisioner" class="w-full bg-purple-500 text-white font-black text-2xl py-5 rounded-[25px] border-4 border-purple-700 shadow-[6px_6px_0px_0px_#7e22ce] hover:translate-y-1 hover:shadow-none transition-all flex justify-center items-center gap-3">
                        답변 보내기 🚀
                    </button>
                </form>
            </div>
            
            <!-- Sukses Kuisioner -->
            <div id="questionnaireSuccess" class="hidden text-center py-16 flex flex-col items-center justify-center animate-bounce">
                <img src="https://media.tenor.com/2sB3uI1L5gQAAAAi/mochi-peach.gif" class="w-32 h-32 mb-6" alt="Happy Cat">
                <h3 class="text-4xl font-black text-purple-600 mb-4">정말 감사합니다! 🎉</h3>
                <p class="text-xl font-bold text-purple-400">당신의 소중한 추억을 잘 간직할게요.</p>
            </div>
        </section>

        <!-- 💊 Obat Hati -->
        <section class="kawaii-card p-10 md:p-16 text-center bg-green-50/70 border-green-300 shadow-[8px_8px_0px_0px_#86efac]">
            <img src="https://media.tenor.com/7N7R5VwK80sAAAAi/pill-cute.gif" class="w-24 h-24 mx-auto mb-4" alt="Dancing Pill">
            <h2 class="text-4xl font-black text-green-600 mb-6">마음의 약국 🏥</h2>
            <p class="text-xl text-green-800 font-bold max-w-xl mx-auto mb-10 leading-relaxed">
                "나의 한국 친구들, 위로나 격려가 필요하거나 감사한 일이 있다면 아래 버튼을 눌러주세요. 인도네시아에 있는 친구가 여러분을 도와줄게요."
            </p>
            <button onclick="openModal()" class="kawaii-btn text-3xl font-black px-12 py-6 rounded-full flex justify-center items-center gap-4 mx-auto hover-jiggle">
                <span>약 열기</span><span class="text-4xl">💊</span>
            </button>
        </section>

    </main>

    <!-- Modal Obat -->
    <div id="medicineModal" class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm hidden flex items-center justify-center z-50 transition-opacity opacity-0">
        <div class="bg-white border-4 border-pink-400 rounded-[40px] shadow-[12px_12px_0px_0px_#f472b6] p-8 md:p-10 w-[95%] max-w-lg relative transform scale-90 transition-transform duration-300 max-h-[90vh] flex flex-col" id="modalContent">
            
            <button onclick="closeModal()" class="absolute -top-4 -right-4 w-12 h-12 bg-red-400 border-4 border-red-600 text-white font-black rounded-full flex items-center justify-center text-xl hover:-translate-y-1 transition-all z-10">✖</button>
            
            <h2 class="text-3xl font-black text-pink-500 mb-2 flex items-center gap-3">
                <img src="https://media.tenor.com/w464z9jD4Z0AAAAi/mochi-peach.gif" class="w-12 h-12" alt="Nurse Cat">
                마음의 약국
            </h2>
            <p class="text-pink-400 font-bold mb-6">현재 당신의 마음 상태를 알려주세요.</p>
            
            <div class="overflow-y-auto hide-scrollbar flex-grow p-1">
                <form id="medicineForm" onsubmit="submitMedicine(event)" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-black mb-2 text-lg">1. 이름이 뭐예요?</label>
                        <input type="text" id="name" required class="kawaii-input w-full px-5 py-4 font-bold text-gray-700">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-black mb-2 text-lg">2. 지금 기분이 어때요?</label>
                        <input type="text" id="feeling" required placeholder="예: 슬픔, 피곤함, 기쁨..." class="kawaii-input w-full px-5 py-4 font-bold text-gray-700">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-black mb-2 text-lg">3. 왜 그런 기분이 드나요?</label>
                        <textarea id="reason" required rows="3" class="kawaii-input w-full px-5 py-4 font-bold text-gray-700"></textarea>
                    </div>
                    <button type="submit" id="submitBtn" class="kawaii-btn w-full text-2xl font-black py-4 rounded-[20px] mt-4 flex justify-center items-center gap-2">
                        처방전 받기 ✨
                    </button>
                </form>

                <div id="loadingState" class="hidden flex flex-col items-center justify-center py-12">
                    <img src="https://media.tenor.com/hJ3-qD1eG9oAAAAi/peach-cat-and-goma-peach-and-goma.gif" class="w-32 h-32 mb-4" alt="Making Medicine">
                    <p class="text-pink-500 font-black text-2xl text-center">인도네시아 친구가<br>약을 만들고 있어요...</p>
                </div>

                <div id="resultArea" class="hidden mt-4">
                    <div class="bg-pink-50 border-4 border-pink-200 rounded-3xl p-6 shadow-inner relative">
                        <p id="devotionalText" class="text-gray-800 leading-relaxed whitespace-pre-line font-bold text-xl"></p>
                    </div>
                    <button onclick="closeModal()" class="w-full mt-6 bg-gray-200 text-gray-700 border-4 border-gray-400 font-black text-xl py-4 rounded-2xl hover:-translate-y-1 transition-all">
                        닫기
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Generator Salju CSS yang Lebih Lebat (120 Partikel)
        const snowContainer = document.getElementById('snowContainer');
        const flakes = ['❄', '❅', '❆'];
        for (let i = 0; i < 30; i++) {
            let snowflake = document.createElement('div');
            snowflake.className = 'snowflake';
            snowflake.innerHTML = flakes[Math.floor(Math.random() * flakes.length)];
            snowflake.style.left = Math.random() * 120 + 'vw';
            // Salju jatuh sedikit lebih cepat agar terlihat hidup
            snowflake.style.animationDuration = Math.random() * 4 + 4 + 's'; 
            snowflake.style.animationDelay = Math.random() * 5 + 's';
            // Ukuran salju bervariasi agar ada kedalaman (depth)
            snowflake.style.fontSize = Math.random() * 1.2 + 0.2 + 'em';
            snowContainer.appendChild(snowflake);
        }

        function scrollGallery(direction) {
            document.getElementById('imageSlider').scrollBy({ left: 350 * direction, behavior: 'smooth' });
        }

        async function submitQuestionnaire(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitKuisioner');
            btn.textContent = "전송 중... (Mengirim...)";
            btn.disabled = true;

            const nama = document.getElementById('q_nama').value;
            const senang = document.getElementById('q_senang').value;
            const menarik = document.getElementById('q_menarik').value;
            const csrfToken = document.querySelector('input[name="_token"]').value;

            try {
                const response = await fetch("{{ route('submit.kuisioner') }}", {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ nama, senang, menarik })
                });

                if (response.ok) {
                    document.getElementById('questionnaireForm').style.display = 'none';
                    document.getElementById('questionnaireSuccess').classList.remove('hidden');
                    confetti({ particleCount: 150, spread: 80, origin: { y: 0.6 } });
                }
            } catch (error) {
                alert("Gagal mengirim data. Coba lagi.");
                btn.textContent = "답변 보내기 🚀";
                btn.disabled = false;
            }
        }

        const modal = document.getElementById('medicineModal');
        const modalContent = document.getElementById('modalContent');
        const form = document.getElementById('medicineForm');
        const loadingState = document.getElementById('loadingState');
        const resultArea = document.getElementById('resultArea');
        const devotionalText = document.getElementById('devotionalText');

        function openModal() {
            modal.classList.remove('hidden');
            setTimeout(() => { modal.classList.add('opacity-100'); modalContent.classList.remove('scale-90'); modalContent.classList.add('scale-100'); }, 10);
            form.reset(); form.classList.remove('hidden'); resultArea.classList.add('hidden'); loadingState.classList.add('hidden');
        }

        function closeModal() {
            modal.classList.remove('opacity-100'); modalContent.classList.remove('scale-100'); modalContent.classList.add('scale-90');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        async function submitMedicine(e) {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const feeling = document.getElementById('feeling').value;
            const reason = document.getElementById('reason').value;
            const csrfToken = document.querySelector('input[name="_token"]').value;

            form.classList.add('hidden'); loadingState.classList.remove('hidden');

            try {
                const response = await fetch("{{ route('generate.devotional') }}", {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ name, feeling, reason })
                });
                const data = await response.json();
                loadingState.classList.add('hidden');

                if (data.success) {
                    devotionalText.textContent = data.data; 
                    resultArea.classList.remove('hidden');
                } else {
                    alert(data.message); form.classList.remove('hidden'); 
                }
            } catch (error) {
                alert("Terjadi kesalahan sistem."); loadingState.classList.add('hidden'); form.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>