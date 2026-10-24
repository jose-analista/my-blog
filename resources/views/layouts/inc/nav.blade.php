<aside class="sidebar-nav-wrapper bg-black bg-gradient">
    <br>
    <br>

    <div class="navbar-logo">
        <a href="{{ route('Welcome') }}">
            <img class="rounded-circle" src="{{ asset('img/icon/perfil_git.gif') }}" alt="logo" width="50px"
                height="50px" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item">
                <a href="{{ route('home') }}">
                    <span class="icon">
                        <!-- Panel de control -->
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="18" height="18" rx="3" stroke="currentColor"
                                    stroke-width="1.8" />
                                <path d="M7 8H17M7 12H17M7 16H13" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" />
                            </svg>
                        </span> </span>
                    <span class="text">Panel de control</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('User.index') }}">
                    <span class="icon">
                        <!-- Usuarios -->
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.8" />
                                <path d="M5 20C5.8 16.5 8.1 14.5 12 14.5C15.9 14.5 18.2 16.5 19 20"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            </svg>
                        </span> </span>
                    <span class="text">Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Empresa.index') }}">
                    <!-- Empresa -->
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 20V6L12 3L20 6V20" stroke="currentColor" stroke-width="1.8"
                                stroke-linejoin="round" />
                            <path d="M8 20V16H16V20M8 9H9M15 9H16M8 12H9M15 12H16" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" />
                        </svg>
                    </span>
                    <span class="text">Empresa</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Fuentes.index') }}">
                    <!-- Fuentes / Links -->
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 13.5L13.5 10" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" />
                            <path
                                d="M7.5 16L5.8 17.7C4.2 19.3 1.8 19.3 0.2 17.7C-1.4 16.1 -1.4 13.7 0.2 12.1L4.5 7.8C6.1 6.2 8.5 6.2 10.1 7.8"
                                transform="translate(2 0)" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" />
                            <path
                                d="M13.9 16.2C15.5 17.8 17.9 17.8 19.5 16.2L23.8 11.9C25.4 10.3 25.4 7.9 23.8 6.3C22.2 4.7 19.8 4.7 18.2 6.3L16.5 8"
                                transform="translate(-2 0)" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" />
                        </svg>
                    </span>
                    <span class="text">Fuentes</span>
                </a>
            </li>

            <li class="nav-item">

                <a href="{{ route('Cliente.index') }}">

                    <span class="icon">

                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Usuario principal -->
                            <circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.8" />

                            <!-- Cuerpo -->
                            <path d="M5 20C5.8 16.5 8.2 14.5 12 14.5C15.8 14.5 18.2 16.5 19 20" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" />

                        </svg>

                    </span>

                    <span class="text">Clientes</span>

                </a>

            </li>


            <li class="nav-item">

                <a href="{{ route('Interaccion.index') }}">

                    <span class="icon">

                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Burbuja de conversación -->
                            <path
                                d="M5 5.5H19C20.1 5.5 21 6.4 21 7.5V15C21 16.1 20.1 17 19 17H12L8 20V17H5C3.9 17 3 16.1 3 15V7.5C3 6.4 3.9 5.5 5 5.5Z"
                                stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />

                            <!-- Líneas de seguimiento -->
                            <path d="M7 9.5H17" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />

                            <path d="M7 13H14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />

                        </svg>

                    </span>

                    <span class="text">Seguimiento</span>

                </a>

            </li>
            <li class="nav-item">

                <a href="">

                    <span class="icon">

                        <!-- Postulaciones -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Documento -->
                            <path d="M6 3.5H14L18 7.5V14" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" />

                            <!-- Esquina -->
                            <path d="M14 3.5V7.5H18" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />

                            <!-- Texto -->
                            <path d="M8.5 10.5H14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />

                            <path d="M8.5 13.5H12" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />

                            <!-- Check -->
                            <circle cx="16.5" cy="17" r="4" fill="currentColor" />

                            <path d="M14.7 17L16 18.3L18.5 15.7" stroke="white" stroke-width="1.4"
                                stroke-linecap="round" stroke-linejoin="round" />

                        </svg>

                    </span>

                    <span class="text">Postulaciones</span>

                </a>

            </li>


            <li class="nav-item">

                <a href="{{ route('Oportunidad.index') }}">

                    <span class="icon">

                        <!-- Oportunidades -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Bombilla -->
                            <path d="M9 18H15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />

                            <path d="M9.5 21H14.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />

                            <path d="M8.5 15.5C7.2 14.5 6.5 12.9 6.5 11.2
                         C6.5 8.2 8.9 5.8 12 5.8
                         C15.1 5.8 17.5 8.2 17.5 11.2
                         C17.5 12.9 16.8 14.5 15.5 15.5
                         C15 15.9 14.7 16.5 14.7 17H9.3
                         C9.3 16.5 9 15.9 8.5 15.5Z" stroke="currentColor" stroke-width="1.8"
                                stroke-linejoin="round" />

                            <!-- Destello -->
                            <path d="M19 5V3M22 8H20M4 8H2M5 5L3.5 3.5" stroke="currentColor" stroke-width="1.6"
                                stroke-linecap="round" />

                        </svg>

                    </span>

                    <span class="text">Oportunidades</span>

                </a>

            </li>
            <li class="nav-item">

                <a href="{{ route('Correo.index') }}">

                    <span class="icon">

                        <!-- Correo -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8" />

                            <path d="M4 7L12 13L20 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />

                        </svg>

                    </span>

                    <span class="text">Correo</span>

                </a>

            </li>


            <li class="nav-item">

                <a href="{{ route('Proyecto.index') }}">

                    <span class="icon">

                        <!-- Proyecto -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Carpeta -->
                            <path d="M3 7.5C3 6.4 3.9 5.5 5 5.5H9L11 8H19C20.1 8 21 8.9 21 10V18.5
                         C21 19.6 20.1 20.5 19 20.5H5C3.9 20.5 3 19.6 3 18.5V7.5Z" stroke="currentColor"
                                stroke-width="1.8" stroke-linejoin="round" />

                            <!-- Diagrama -->
                            <circle cx="8" cy="13" r="1.5" fill="currentColor" />

                            <circle cx="16" cy="13" r="1.5" fill="currentColor" />

                            <circle cx="12" cy="17" r="1.5" fill="currentColor" />

                            <path d="M9.5 13H14.5M8.8 14.2L11 16M15.2 14.2L13 16" stroke="currentColor"
                                stroke-width="1.4" stroke-linecap="round" />

                        </svg>

                    </span>

                    <span class="text">Proyecto</span>

                </a>

            </li>
            <li class="nav-item">

                <a href="{{ route('Requisito.index') }}">

                    <span class="icon">

                        <!-- Documento de requisitos + checklist -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Documento -->
                            <path d="M6 3.5H14L18 7.5V20.5H6C5.45 20.5 5 20.05 5 19.5V4.5C5 3.95 5.45 3.5 6 3.5Z"
                                stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />

                            <!-- Esquina -->
                            <path d="M14 3.5V7.5H18" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />

                            <!-- Checklist -->
                            <path d="M8 11L8.8 11.8L10.2 10.3" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />

                            <path d="M11.5 11H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />

                            <path d="M8 14.5L8.8 15.3L10.2 13.8" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />

                            <path d="M11.5 14.5H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />

                            <path d="M8 18L8.8 18.8L10.2 17.3" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />

                            <path d="M11.5 18H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />

                        </svg>

                    </span>

                    <span class="text">Levantar requisitos</span>

                </a>

            </li>

            <li class="nav-item">

                <a href="{{ route('Venta.index') }}">

                    <span class="icon">

                        <!-- Venta -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Carrito -->
                            <path d="M3 4H5L7.2 15.2C7.4 16.2 8.3 17 9.3 17H18" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" />

                            <path d="M6 7H21L19 13H7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />

                            <!-- Ruedas -->
                            <circle cx="9.5" cy="20" r="1.5" fill="currentColor" />

                            <circle cx="17.5" cy="20" r="1.5" fill="currentColor" />

                        </svg>

                    </span>

                    <span class="text">Venta</span>

                </a>

            </li>


            <li class="nav-item">

                <a href="{{ route('Diseno.index') }}">

                    <span class="icon">

                        <!-- Diseños Web -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Monitor -->
                            <rect x="3" y="4" width="18" height="13" rx="2" stroke="currentColor" stroke-width="1.8" />

                            <!-- Código -->
                            <path d="M8 9L6 11L8 13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round" />

                            <path d="M16 9L18 11L16 13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round" />

                            <path d="M13.5 8L10.5 14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />

                            <!-- Base -->
                            <path d="M8 21H16M12 17V21" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" />

                        </svg>

                    </span>

                    <span class="text">Diseños Web</span>

                </a>

            </li>


            <li class="nav-item">

                <a href="{{ route('Servicios.index') }}">

                    <span class="icon">

                        <!-- Servicios -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Llave inglesa -->
                            <path d="M14.5 6.5C15.2 5.1 14.9 3.4 13.7 2.3
                         C12.5 1.2 10.7 1 9.4 1.8
                         L12.2 4.6L9.6 7.2L6.8 4.4
                         C6 5.8 6.2 7.5 7.3 8.7
                         C8.4 9.9 10.1 10.2 11.5 9.5L18.5 16.5" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" />

                            <circle cx="19" cy="19" r="2.5" stroke="currentColor" stroke-width="1.8" />

                        </svg>

                    </span>

                    <span class="text">Servicios</span>

                </a>

            </li>


            <li class="nav-item">

                <a href="{{ route('Markdown.show') }}">

                    <span class="icon">

                        <!-- Documentos -->
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <!-- Documento -->
                            <path d="M6 3.5H14L18 7.5V20.5H6C5.45 20.5 5 20.05 5 19.5V4.5C5 3.95 5.45 3.5 6 3.5Z"
                                stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />

                            <!-- Esquina -->
                            <path d="M14 3.5V7.5H18" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />

                            <!-- Texto -->
                            <path d="M8.5 11H15.5M8.5 14H15.5M8.5 17H13" stroke="currentColor" stroke-width="1.6"
                                stroke-linecap="round" />

                        </svg>

                    </span>

                    <span class="text">Documentos</span>

                </a>

            </li>


            <li class="nav-item">
                <a href="{{ route('Markdown.show') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/traductor.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">LibreTranslate</span>
                </a>
            </li>

            <span class="divider">
                <hr />
            </span>
            <li class="nav-item">
                <a href="{{ route('PyAccountant.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/api.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">PyAccountant</span>
                </a>
            </li>
            <li class="nav-item">

                <a href="{{ route('Contacto.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/api.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">FormBot</span>
                </a>
            </li>
            <li class="nav-item">

                <a href="{{ route('Contacto.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/api.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Monitor++</span>
                </a>
                <!-- </li>
                 <li class="nav-item">

                <a href="{{ route('Phpmyadmin.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/api.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">PhpMyAdmin</span>
                </a>
            </li> -->
                <span class="divider">
                    <hr />
                </span>
            <li class="nav-item">
                <a href="{{ route('Contacto.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/contacto1.png')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Contacto</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Tecnologia.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/tecnologia1.png')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Tecnología</span>
                </a>
            </li>

            <span class="divider">
                <hr />
            </span>

            <li class="nav-item">
                <a href="{{ route('Educacion.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/educacion1.png')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Educación</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Experiencia.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/experiencia1.png')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Experiencia Profesional</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>