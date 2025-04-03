@extends('adminlte::page')

@section('content_header')
    <h1><b>Materias/Editar Materia</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Editar Materia</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/materias/' . $materia->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nombre de la carrera</label><b> (*)</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-graduation-cap"></i>
                                    </span>
                                </div>
                                <select class="form-control" name="carrera_id" required>
                                    <option value="">Seleccione una Carrera</option>
                                    @foreach($carreras as $carrera)
                                        <option value="{{ $carrera->id}}"
                                        {{ old('carrera_id', $materia->carrera_id) == $carrera->id ? 'selected' : '' }}>
                                        {{ $carrera->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('carrera_id')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre de la Materia<b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="nombre"
                                    value="{{ old('nombre', $materia->nombre) }}"
                                    placeholder="Escriba el nombre de la materia..." required>
                            </div>  
                            @error('nombre')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="codigo">Código de la Materia<b>(*)</b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-barcode"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="codigo"
                                    value="{{ old('codigo', $materia->codigo) }}"
                                    placeholder="Escriba el código de la materia..." required>
                            </div>
                            @error('codigo')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{url('/admin/materias')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop