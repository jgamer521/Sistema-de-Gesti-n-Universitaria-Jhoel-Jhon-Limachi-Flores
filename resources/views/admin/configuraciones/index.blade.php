@extends('adminlte::page')

@section('content_header')
    <h1>Configuraciones</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llena los datos del formulario</h3>
                </div>
                {{-- formulario --}}
                <div class="card-body">
                    <form action="{{url('admin/configuraciones/create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Primera columna --}}
                            <div class="col-md-4">
                                {{-- Nombre --}}
                                <div class="form-group">
                                    <label for="">Nombre</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('nombre', $configuracion->nombre ?? '') }}" name="nombre" required>
                                    </div>
                                    @error('nombre')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>

                                {{-- Dirección --}}
                                <div class="form-group">
                                    <label for="">Dirección</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('direccion', $configuracion->direccion ?? '') }}" name="direccion" required>
                                    </div>
                                    @error('direccion')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <label for="">Email</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" value="{{ old('email', $configuracion->email ?? '') }}" name="email" required>
                                    </div>
                                    @error('email')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Segunda columna --}}
                            <div class="col-md-4">
                                {{-- Descripción --}}
                                <div class="form-group">
                                    <label for="">Descripción</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('descripcion', $configuracion->descripcion ?? '') }}" name="descripcion" required>
                                    </div>
                                    @error('descripcion')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>

                                {{-- Teléfono --}}
                                <div class="form-group">
                                    <label for="">Teléfono</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('telefono', $configuracion->telefono ?? '') }}" name="telefono" required>
                                    </div>
                                    @error('telefono')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>

                                {{-- Web --}}
                                <div class="form-group">
                                    <label for="">Sitio Web</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('web', $configuracion->web ?? '') }}" name="web">
                                    </div>
                                    @error('web')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Tercera columna - Logo --}}
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="logo">Logo</label><b> (*)</b>
                                    <input type="file" id="file" name="logo" accept=".jpg, .jpeg, .png" class="form-control">
                                    @error('logo')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                    <br>
                                    <output id="list">
                                        @if (isset($configuracion->logo))
                                            <img class="thumb thumbnail" src="{{url($configuracion->logo)}}" width="70%" title="logo">
                                        @endif
                                    </output>
                                    <script>
                                        function archivo(evt){
                                            var files = evt.target.files;
                                            for(var i = 0, f; f = files[i]; i++){
                                                if (!f.type.match('image.*')) {
                                                    continue;
                                                }
                                                var reader = new FileReader();
                                                reader.onload = (function(theFile){
                                                    return function(e){
                                                        document.getElementById("list").innerHTML = '<img class="thumb thumbnail" src="' + e.target.result + '" width="70%">';
                                                    };
                                                })(f);
                                                reader.readAsDataURL(f);
                                            }
                                        }
                                        document.getElementById('file').addEventListener('change', archivo, false);
                                    </script>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Fin del formulario --}}
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
