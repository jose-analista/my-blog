@extends ('layouts.inc.admin')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Contacto
                </h4>
            </div>
            
            <?php
            $contandor=1;
            ?>
            @forelse ($contacto as $item)
            <div class="card-body">
                <h3>Nombre : {{ $item->users->name }}</h3>
                <br>
                <h5 class="card-title">Correo : {{ $item->users->email }}</h5>
                <br>
                <p class="card-text">Asunto : {{ $item->asunto }}</p>
                <p class="card-text">Mensaje : {{ $item->mensaje }}</p>
                <br>
            </div>
            <?php
            $contandor++;
            ?>
            @empty
            <!--
    <tr>
                                <div>
                                    <h1>No hay productos</h1>
                                </div>
                            </tr>

                              -->
            @endforelse
        </div>
    </div>
</div>

@endsection