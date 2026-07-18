@extends ('layouts.inc.admin')

@section('content')

    <div class="container-fluid">

     
        @include('admin.mail.hero')

        @include('admin.mail.estadistica')

        @include('admin.mail.funcionalidades')

        @include('admin.mail.historial')

    </div>

    @include('admin.mail.modal.formenviarcorreo')
    @foreach($emails as $email)

        <!-- tarjeta o fila -->

        @include('admin.mail.modal.vercorreo')

    @endforeach

@endsection