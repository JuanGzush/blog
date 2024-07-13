@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tags.store') }}" method="POST">
                @csrf
                @include('admin.tags.partials.form')



                {{--    <div class="form-group">
                    <label for="name" class="">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Ingrese el nombre de la etiqueta" required>

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="slug" class="mt-4">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control disabled"
                        placeholder="Ingrese el slug de la etiqueta" readonly>

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {{-- <label for="">Color:</label>
                <select name="color" id="" class="form-control">
                    <option value="red">Color rojo</option>
                    <option value="green">Color verde</option>
                    <option value="blue " selecte>Color azul</option>
                </select> --}}

                {{-- }}       <label for="color">Color:</label>
                    <select name="color" id="color" class="form-control">
                        @foreach ($colors as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('color')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> --}}

                <button type="submit" class="btn btn-primary mt-4"> Crear etiqueta </button>
            </form>
        </div>
    </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop


@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>

@endsection
