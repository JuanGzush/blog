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
                        <label>
                            <input type="radio" name="status" value="1" checked>
                            Publicado
                        </label>
                        
                        <label>
                            <input type="radio" name="status" value="2">
                            Borrador
                        </label>

                    </div>

                    <div class="form-group">
                        <label for="extract">Extracto</label>
                        <textarea name="extract" id="extract" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="body">Cuerpo del post:</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                    </div>



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
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />


@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>


    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
            }
        }
    </script>


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

    <script type="module">
        /* para la integracion de ckeditor en en textarea de extract */
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';
        ClassicEditor
            .create(document.querySelector('#extract'), {
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(extract => {
                window.extract = extract;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script type="module">
        /* para la integracion de ckeditor en en textarea de body */
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';
        ClassicEditor
            .create(document.querySelector('#body'), {
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(body => {
                window.body = body;
            })
            .catch(error => {
                console.error(error);
            });
    </script>








@endsection
