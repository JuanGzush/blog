@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>crear posts</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="name" class="">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Ingrese el nombre del post" required>

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="slug" class="mt-4">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control disabled"
                        placeholder="Ingrese el slug del post" readonly>
                   
                    <label for="category_id">Categoría</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $key => $value)
                            <option value="{{ $key }}" {{ old('categories') == $key ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <p class="font-weigth-bold">Etiquetas</p>
                        @foreach ($tags as $tag)
                            <label for="">

                                <label class="mr-2" for="">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </label>
                        @endforeach

                    </div>

                    <div class="form-group">
                        <label for="extract">Extracto</label>
                        <textarea name="extract" class="form-control"></textarea>
                    </div>

                    <div>
                        <label for="body">Cuerpo del post:</label>
                        <textarea name="body" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear post</button>

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn btn-primary mt-4"> Crear post </button>
            </form>
        </div>
    </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>





    <script>
        // para la creacion automatica del slug
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>





@endsection
