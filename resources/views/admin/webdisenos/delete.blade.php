@extends('layouts.inc.admin')

@section('content')

<div class="card">

    <h5 class="card-header">
        Eliminar Diseño
    </h5>

    <div class="card-body">

        <div class="alert alert-danger" role="alert">

            <p>
                ¿Estás seguro de eliminar este diseño?
            </p>

            <table class="table table-sm table-hover">

                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <td>
                            {{ $diseno->nombre }}
                        </td>

                        <td>
                            {{ $diseno->categoria ?? 'Sin categoría' }}
                        </td>

                        <td>
                            {{ $diseno->descripcion ?? 'Sin descripción' }}
                        </td>

                    </tr>
                </tbody>

            </table>

            <hr>

            <form
                action="{{ route('Diseno.destroy', $diseno->id) }}"
                method="POST"
            >

                @csrf

                @method('DELETE')

                <a
                    href="{{ route('Diseno.index') }}"
                    class="btn btn-info"
                >
                    Volver
                </a>

                <button
                    type="submit"
                    class="btn btn-danger"
                >
                    Eliminar
                </button>

            </form>

        </div>

    </div>

</div>

@endsection