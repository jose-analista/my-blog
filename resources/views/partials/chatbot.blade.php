

<!-- ===== CHAT IA FLOATING ===== -->
<div class="fixed bottom-3 right-3 z-50 scale-90 origin-bottom-right">

    <!-- Botón -->
    <button id="toggleChat"
        class="w-12 h-12 rounded-full bg-cyan-500 hover:bg-cyan-400 text-white shadow-xl flex items-center justify-center transition hover:scale-105">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4v-4z" />

        </svg>

    </button>

    <!-- Chat -->
    <div id="chatBox"
        class="hidden absolute bottom-16 right-0 w-[280px] h-[420px] bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl overflow-hidden flex flex-col">

        <!-- Header -->
        <div
            class="bg-gradient-to-r from-cyan-500 to-blue-500 px-3 py-3 flex items-center gap-2 border-b border-white/10">

            <div
                class="w-9 h-9 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center text-white font-black text-xs">
                AI
            </div>

            <div>

                <h2 class="text-white font-bold text-sm">
                    Asistente IA
                </h2>

                <p class="text-white/70 text-[11px]">
                    ¿Cómo te puedo ayudar?
                </p>

            </div>

        </div>

        <!-- Mensajes -->
        <div id="messages"
            class="flex-1 overflow-y-auto p-3 space-y-3 bg-slate-950">

            <!-- IA -->
            <div class="flex items-start gap-2">

                <div
                    class="w-7 h-7 rounded-lg bg-cyan-500 flex items-center justify-center text-white text-[10px] font-bold">
                    AI
                </div>

                <div
                    class="max-w-[82%] bg-slate-800 border border-slate-700 rounded-2xl rounded-tl-sm px-3 py-2 text-slate-200 text-[11px] leading-relaxed shadow">

                    Hola 👋<br>
                    Soy el asistente virtual de José Calderón.

                </div>

            </div>

        </div>

        <!-- Loading -->
        <div id="typing"
            class="hidden px-3 py-1 text-slate-400 text-[11px]">
            Escribiendo...
        </div>

        <!-- Input -->
        <div
            class="p-2 border-t border-slate-800 bg-slate-900">

            <div class="flex items-center gap-2">

                <input
                    id="prompt"
                    type="text"
                    placeholder="Mensaje..."
                    class="flex-1 h-9 bg-slate-950 border border-slate-700 rounded-xl px-3 text-[11px] text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400">

                <button
                    id="send"
                    class="h-9 px-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-white text-[11px] font-bold transition">

                    Enviar

                </button>

            </div>

        </div>

    </div>

</div>