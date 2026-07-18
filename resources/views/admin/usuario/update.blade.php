@extends ('layouts.inc.admin')

@section('content')
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Usuarios</h4>
                <p class="card-description">
                    Actualizar usuario
                </p>
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        {{ $mensaje }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="forms-sample" action="{{ route('User.update', $user->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1">Imagen</label>
                        <input type="file" class="form-control" name="imagen">
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
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        @error('name')
                            <div class="alert alert-danger">
                                <strong>Error no borre el dato</strong>
                            </div>
                        @enderror
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Correo</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        @error('email')
                            <div class="alert alert-danger">
                                <strong>Error no borre el dato</strong>
                            </div>
                        @enderror
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Teléfono</label>
                        <input type="text" class="form-control" name="fono" value="{{ $user->fono }}">
                        @error('fono')
                            <div class="alert alert-danger">
                                <strong>Error no borre el dato</strong>
                            </div>
                        @enderror
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Rol</label><br>
                        <select name="role_as" class="form-control">
                            <option value="{{ $user->role_as == '1' ? '1' : '0' }}">
                                <p>Rol actual del usuario: {{ $user->role_as == '1' ? 'Administrador' : 'Cliente' }}</p>
                            </option>
                            <option value="0">Cliente</option>
                            <option value="1">Administrador</option>
                        </select>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Contraseña</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div class="alert alert-danger">
                                <strong>Error ingrese contraseña para actualizar</strong>
                            </div>
                        @enderror
                        <br>
                    </div>
                    <button type="submit" class="btn btn-outline-dark btn-lg">Actualizar</button>
                    <a href="{{ route('User.index') }}" class="btn btn-outline-primary btn-lg">Volver</a>
                </form>
            </div>
        </div>
    </div>
@endsection
