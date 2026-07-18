@extends ('layouts.inc.admin')

@section('content')
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Usuarios</h4>
                <p class="card-description">
                    Eliminar Usuario
                </p>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ¿Estás seguro de eliminar este registro?
                </div>
                <form class="forms-sample" action="{{ route('User.destroy', $user->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label for="exampleInputUsername1">Imagen</label>
                        <br>
                        @if ($user->imagen)
                            <img src="{{ asset($user->imagen) }}" alt="" width="100px" height="100px">
                            <br>
                        @else
                            <h5>No hay imagen</h5>
                            <br>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Correo</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Rol</label><br>
                        <p>Rol actual del usuario: {{ $user->role_as == '1' ? 'Administrador' : 'Cliente' }}</p>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-danger btn-lg">Eliminar</button>
                    <a href="{{ route('User.index') }}" class="btn btn-outline-primary btn-lg">Volver</a>
                </form>
            </div>
        </div>
    </div>
@endsection
