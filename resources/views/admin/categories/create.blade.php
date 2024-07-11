@extends('adminlte::page')

@section('title', 'Blog One')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Ingrese el nombre de la categoría" required>

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="slug" class="mt-4">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control disabled"
                        placeholder="Ingrese el slug de la categoría" readonly>

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn btn-primary mt-4"> Crear categoría </button>
            </form>
        </div>
    </div>
    </div>
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
