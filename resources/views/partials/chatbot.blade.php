
<!-- ===== CHAT IA FLOATING · CAYTECH ===== -->
<div class="fixed bottom-5 right-5 z-50">

    <!-- Botón flotante -->
    <button
        id="toggleChat"
        type="button"
        aria-label="Abrir asistente virtual"
        aria-controls="chatBox"
        aria-expanded="false"
        class="group relative flex h-14 w-14 items-center justify-center rounded-2xl
               bg-gradient-to-br from-cyan-400 to-blue-600 text-white
               shadow-[0_8px_30px_rgba(6,182,212,0.35)]
               transition duration-300 hover:-translate-y-1 hover:scale-105
               hover:shadow-[0_12px_35px_rgba(6,182,212,0.45)]
               focus:outline-none focus:ring-4 focus:ring-cyan-400/30">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-7 w-7 transition duration-300 group-hover:rotate-[-8deg]"
             fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4v-4z"/>
        </svg>

        <span class="absolute -right-1 -top-1 h-4 w-4 rounded-full
                     border-[3px] border-slate-950 bg-emerald-400"></span>
    </button>

    <!-- Panel del asistente -->
    <div
        id="chatBox"
        class="absolute bottom-[4.5rem] right-0 hidden
               flex h-[min(540px,calc(100dvh-120px))] w-[min(360px,calc(100vw-32px))]
               flex-col overflow-hidden rounded-3xl
               border border-white/10 bg-slate-950
               shadow-[0_24px_80px_rgba(0,0,0,0.55)]
               ring-1 ring-black/20">

        <!-- Cabecera -->
        <header class="relative overflow-hidden border-b border-white/10
                       bg-gradient-to-br from-slate-900 via-slate-900 to-cyan-950/60
                       px-5 py-4">

            <div class="pointer-events-none absolute -right-10 -top-14
                        h-36 w-36 rounded-full bg-cyan-400/10 blur-3xl"></div>

            <div class="relative flex items-center gap-3">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center
                            rounded-2xl border border-cyan-300/20
                            bg-gradient-to-br from-cyan-400/20 to-blue-500/20
                            text-sm font-black tracking-wide text-cyan-300">
                    AI
                </div>

                <div class="min-w-0 flex-1">
                    <h2 class="text-sm font-bold tracking-wide text-white">
                        Asistente virtual
                    </h2>

                    <div class="mt-1 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-emerald-400
                                     shadow-[0_0_8px_rgba(52,211,153,0.65)]"></span>
                        <p class="text-xs text-slate-400">
                            Asistente de José Calderón
                        </p>
                    </div>
                </div>

                <button
                    id="closeChat"
                    type="button"
                    aria-label="Cerrar asistente"
                    class="flex h-9 w-9 shrink-0 items-center justify-center
                           rounded-xl text-slate-400 transition
                           hover:bg-white/10 hover:text-white
                           focus:outline-none focus:ring-2 focus:ring-cyan-400/50">

                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 6l12 12M18 6L6 18"/>
                    </svg>
                </button>
            </div>

            <p class="relative mt-4 text-xs leading-relaxed text-slate-400">
                Consultas sobre desarrollo web, Laravel, APIs e inteligencia artificial.
            </p>
        </header>

        <!-- Conversación -->
        <div
            id="messages"
            role="log"
            aria-live="polite"
            aria-label="Conversación con el asistente"
            class="flex-1 space-y-4 overflow-y-auto bg-slate-950
                   px-4 py-5 scroll-smooth">

            <!-- Mensaje inicial -->
            <div class="flex items-start gap-2.5">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center
                            rounded-xl bg-cyan-400/10 text-[10px]
                            font-black text-cyan-300 ring-1 ring-cyan-400/20">
                    AI
                </div>

                <div class="max-w-[85%] rounded-2xl rounded-tl-md
                            border border-white/[0.07] bg-slate-900
                            px-4 py-3 text-sm leading-6 text-slate-200">
                    ¡Hola! 👋<br>
                    Soy el asistente virtual de José Calderón.
                    <p class="mt-2 text-slate-400">
                        ¿En qué proyecto tecnológico puedo ayudarte hoy?
                    </p>
                </div>
            </div>
        </div>

        <!-- Estado de escritura -->
        <div
            id="typing"
            role="status"
            class="hidden items-center gap-2 px-5 py-2 text-xs text-slate-400">

            <span>Preparando respuesta</span>
            <span class="flex gap-1">
                <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-cyan-400"></span>
                <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-cyan-400 [animation-delay:150ms]"></span>
                <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-cyan-400 [animation-delay:300ms]"></span>
            </span>
        </div>

        <!-- Entrada de mensaje -->
        <footer class="border-t border-white/[0.08] bg-slate-900/90 p-3">
            <div class="flex items-center gap-2 rounded-2xl
                        border border-white/10 bg-slate-950 p-1.5
                        transition focus-within:border-cyan-400/60
                        focus-within:ring-2 focus-within:ring-cyan-400/10">

                <input
                    id="prompt"
                    type="text"
                    maxlength="2000"
                    autocomplete="off"
                    aria-label="Escribe tu mensaje"
                    placeholder="Escribe tu consulta..."
                    class="min-w-0 flex-1 bg-transparent px-3 py-2
                           text-sm text-white placeholder-slate-500
                           focus:outline-none">

                <button
                    id="send"
                    type="button"
                    class="flex h-10 shrink-0 items-center justify-center gap-2
                           rounded-xl bg-cyan-500 px-3.5 text-xs font-bold
                           text-slate-950 transition hover:bg-cyan-300
                           focus:outline-none focus:ring-2 focus:ring-cyan-300/50
                           disabled:cursor-not-allowed disabled:opacity-50">

                    Enviar

                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 12h14m-6-6l6 6-6 6"/>
                    </svg>
                </button>
            </div>

            <p class="mt-2 text-center text-[10px] text-slate-500">
                Asistente con IA · Las respuestas pueden contener errores
            </p>
        </footer>
    </div>
</div>
