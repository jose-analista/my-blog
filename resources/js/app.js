import './bootstrap';
import $ from 'jquery';
import Typed from 'typed.js';
import OpenAI from "openai";

window.$ = window.jQuery = $;

import './configuration__navbar';

import './datatables';

document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Typed
    |--------------------------------------------------------------------------
    */

    const typedElement = document.querySelector('.typed');

    if (typedElement) {

        let items = typedElement.getAttribute('data-typed-items');

        items = items.split(',');

        new Typed('.typed', {
            strings: items,
            typeSpeed: 80,
            backSpeed: 50,
            backDelay: 2000,
            loop: true,
        });

    }

    /*
    |--------------------------------------------------------------------------
    | OpenAI / Groq
    |--------------------------------------------------------------------------
    */

    const client = new OpenAI({
        apiKey: import.meta.env.VITE_GROQ_API_KEY,
        baseURL: import.meta.env.VITE_GROQ_BASE_URL,
        dangerouslyAllowBrowser: true
    });

    /*
    |--------------------------------------------------------------------------
    | Chat Elements
    |--------------------------------------------------------------------------
    */

    const toggleChat = document.getElementById("toggleChat");
    const chatBox = document.getElementById("chatBox");
    const messages = document.getElementById("messages");
    const send = document.getElementById("send");
    const promptInput = document.getElementById("prompt");
    const typing = document.getElementById("typing");

    /*
    |--------------------------------------------------------------------------
    | Validate
    |--------------------------------------------------------------------------
    */

    if (
        !toggleChat ||
        !chatBox ||
        !messages ||
        !send ||
        !promptInput ||
        !typing
    ) {
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Toggle Chat
    |--------------------------------------------------------------------------
    */

    toggleChat.addEventListener("click", () => {
        chatBox.classList.toggle("hidden");
    });

    /*
    |--------------------------------------------------------------------------
    | Add Message
    |--------------------------------------------------------------------------
    */

    function addMessage(text, type = "bot") {

        const wrapper = document.createElement("div");

        wrapper.className =
            type === "user"
                ? "flex justify-end"
                : "flex items-start gap-3";

        if (type === "user") {

            wrapper.innerHTML = `
                <div class="max-w-[80%] bg-cyan-500 text-white rounded-2xl rounded-br-sm px-5 py-4 text-sm shadow-lg">
                    ${text}
                </div>
            `;

        } else {

            wrapper.innerHTML = `
                <div class="w-10 h-10 rounded-xl bg-cyan-500 flex items-center justify-center text-white font-bold">
                    AI
                </div>

                <div class="max-w-[80%] bg-slate-800 border border-slate-700 rounded-2xl rounded-tl-sm px-5 py-4 text-slate-200 text-sm leading-relaxed shadow-lg">
                    ${text}
                </div>
            `;
        }

        messages.appendChild(wrapper);

        messages.scrollTop = messages.scrollHeight;
    }

    /*
    |--------------------------------------------------------------------------
    | Send Message
    |--------------------------------------------------------------------------
    */

    async function sendMessage() {

        const text = promptInput.value.trim();

        if (!text) return;

        addMessage(text, "user");

        promptInput.value = "";

        typing.classList.remove("hidden");

        try {

            const response = await client.chat.completions.create({

                model: "llama-3.3-70b-versatile",

                messages: [

                    {
                        role: "system",
                        content: `
                        Eres el asistente virtual profesional del sitio web de José Calderón.

                        Servicios:
                        - Desarrollo Laravel
                        - APIs REST
                        - VPS Linux
                        - Docker
                        - IA
                        - Automatización
                        - Desarrollo Full Stack

                        Responde profesionalmente y breve.
                        `
                    },

                    {
                        role: "user",
                        content: text
                    }

                ]

            });

            typing.classList.add("hidden");

            addMessage(
                response.choices[0].message.content,
                "bot"
            );

        } catch (error) {

            typing.classList.add("hidden");

            addMessage(
                "Ocurrió un error al conectar con la IA.",
                "bot"
            );

            console.error(error);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    send.addEventListener("click", sendMessage);

    promptInput.addEventListener("keypress", (e) => {

        if (e.key === "Enter") {
            sendMessage();
        }

    });

});