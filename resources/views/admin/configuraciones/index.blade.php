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
                {{-- Formulario --}}
                <div class="card-body">
                    <form action="{{ url('admin/configuraciones/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Primera columna --}}
                            <div class="col-md-4">
                                @foreach (['nombre' => 'Nombre', 'direccion' => 'Dirección', 'email' => 'Email'] as $field => $label)
                                    <div class="form-group">
                                        <label for="{{ $field }}">{{ $label }} <b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-{{ $field === 'nombre' ? 'university' : ($field === 'direccion' ? 'map-marker-alt' : 'envelope') }}"></i></span>
                                            </div>
                                            <input type="{{ $field === 'email' ? 'email' : 'text' }}" class="form-control" value="{{ old($field, $configuracion->$field ?? '') }}" name="{{ $field }}" required>
                                        </div>
                                        @error($field)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            {{-- Segunda columna --}}
                            <div class="col-md-4">
                                @foreach (['descripcion' => 'Descripción', 'telefono' => 'Teléfono'] as $field => $label)
                                    <div class="form-group">
                                        <label for="{{ $field }}">{{ $label }} <b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-{{ $field === 'descripcion' ? 'align-left' : 'phone' }}"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ old($field, $configuracion->$field ?? '') }}" name="{{ $field }}" required>
                                        </div>
                                        @error($field)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endforeach

                                {{-- Sitio Web --}}
                                <div class="form-group">
                                    <label for="web">Sitio Web</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('web', $configuracion->web ?? '') }}" name="web">
                                    </div>
                                    @error('web')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Tercera columna - Logo --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="logo">Logo <b>(*)</b></label>
                                    <input type="file" id="file" name="logo" accept=".jpg, .jpeg, .png" class="form-control">
                                    @error('logo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <output id="list">
                                        @if (isset($configuracion->logo))
                                            <img class="thumb thumbnail" src="{{ url($configuracion->logo) }}" width="70%" title="logo">
                                        @endif
                                    </output>
                                    <script>
                                        document.getElementById('file').addEventListener('change', function(evt) {
                                            const files = evt.target.files;
                                            for (let i = 0; i < files.length; i++) {
                                                const f = files[i];
                                                if (!f.type.match('image.*')) continue;

                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    document.getElementById("list").innerHTML = '<img class="thumb thumbnail" src="' + e.target.result + '" width="70%">';
                                                };
                                                reader.readAsDataURL(f);
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ url('admin/configuraciones') }}" class="btn btn-secondary">Cancelar</a>
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