@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="">Nombre</label>

                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $category->name) }}" placeholder="Ingrese el nombre de la categoría" required>

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="slug" class="mt-4">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control"
                        value="{{ old('name', $category->slug) }}" placeholder="Ingrese el slug de la categoría" readonly>

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn btn-primary mt-4"> Actualizar categoría </button>
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
