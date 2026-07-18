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
                        <img src="{{asset('img/icon/panel1.png')}}" alt="" width="22" height="22" class="icon-navbar">
                    </span>
                    <span class="text">Panel de control</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('User.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/cliente1.png')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Empresa.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/empresa1.png')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Empresa</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Fuentes.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/link.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Fuentes</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Cliente.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/client.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Clientes</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Interaccion.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/followup.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Seguimiento</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Oportunidad.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/oportunidades.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Oportunidades</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Correo.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/document.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Correo</span>
                </a>
            </li>

               <li class="nav-item">
                <a href="{{ route('Proyecto.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/project-diagram-svgrepo-com.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Proyecto</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Requisito.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/requisitos.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Levantar requisitos</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Tareas.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/task.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Tareas</span>
                </a>
            </li>

         
            <li class="nav-item">
                <a href="{{ route('Venta.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/venta1.png')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Venta</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Servicios.index') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/services.svg')}}" alt="" width="22" height="22">
                    </span>
                    <span class="text">Servicios</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Markdown.show') }}">
                    <span class="icon">
                        <img src="{{asset('img/icon/document.svg')}}" alt="" width="22" height="22">
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