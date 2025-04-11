@extends('adminlte::page')

@section('content_header')
    <h1><b>Personal Administrativo/Registro de un nuevo personal administrativo</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del formulario</h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{url('admin/administrativos/create')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rol">Nombre del rol</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" id="" class="form-control">
                                            <option value="">Selecciones un rol..</option>
                                            @foreach ($roles as $rol)
                                                <option value="{{$rol ->name}}">{{$rol->name}}</option>
                                            @endforeach
                                        </select>
                                    </div >
                                    @error('rol')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- FORM NOMBRES -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" placeholder="Ingrese nombres..." required>
                                    </div>
                                    @error('nombres')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- FORM APELLIDOS -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" placeholder="Ingrese apellidos..." required>
                                    </div>
                                    @error('apellidos')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- FORM CI -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ci">Cédula de Identidad</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ci" value="{{ old('ci') }}" placeholder="Ingrese cédula de identidad..." required>
                                    </div>
                                    @error('ci')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- FORM FECHA DE NACIMIENTO -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" placeholder="" required>
                                    </div>
                                    @error('fecha_nacimiento')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- FORM TELEFONO-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="Ingrese teléfono..." required>
                                    </div>
                                    @error('telefono')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- FORM EMAIL-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingrese su correo electrónico..." required>
                                    </div>
                                    @error('email')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- FORM PROFESION-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="profesion">Profesión</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-briefcase"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="profesion" value="{{ old('profesion') }}" placeholder="Ingrese profesión..." required>
                                    </div>
                                    @error('profesion')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- FORM DIRECCION-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" placeholder="Ingrese dirección..." required>
                                    </div>
                                    @error('direccion')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                    <a href="{{url('/admin/administrativos')}}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
