@extends('adminlte::page')

@section('content_header')
    <h1><b>materias/Registro de un nueva Materia</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lleno los datos del formulario</h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{url('admin/materias/create')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre de la carrera</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clone"></i></span>
                                        </div>
                                        <select class="from-control" name="carrera_id" required>
                                            <option value="">Selecciona una carrera...</option>
                                                @foreach($carreras as $carrera)
                                                    <option value="{{ $carrera->id }}" {{ old('carrera_id') == $carrera->id ? 'select' : '' }}>
                                                        {{ $carrera->nombre }}
                                                    </option>
                                                @endforeach
                                        </select>
                                    </div>
                                    @error('carrera_id')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre de la Materia</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa_book"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombre" value="{{old('nombre') }}" placeholder="ingrese el nombre de la materia..." required>
                                    </div>
                                    @error("nombre")
                                    <email style="color: red">{{$message}}</email>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="codigo">Codigo de la Materia</label><b>(*)</b>
                                    <div class="input-md-3">
                                        <div class="input-group-prepared">
                                            <span class="input-group-text"><i class="fa fas-barcode"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="codigo" value="{{ old('codigo')}}" placeholder="Ingrese el Codigo.." required>
                                    </div>
                                    @error('codigo')
                                    <email style="color: red">{{$message}}</email>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/materias')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
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
