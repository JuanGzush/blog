{!! Form::model($tag, ['route' => ['admin.tags.update',$tag], 'method' => 'put']) !! }
@include('admin.tags.partials.form')
{!! Form::close() !!}

<form action="{{ route('admin.tags.update', $tag) }}" method="POST">
    @method('PUT')
    @csrf
    @include('admin.tags.partials.form')
</form>


<form action="{{ route('admin.tags.update', $tag) }}" method="POST">
    @method('PUT')
    @csrf
    @include('admin.tags.partials.form', ['tag' => $tag])
    <!-- Para cada campo del formulario, asegúrate de utilizar old() para mostrar los valores anteriores -->
    <input type="text" name="campo1" value="{{ old('campo1', $tag->campo1) }}">
    <input type="text" name="campo2" value="{{ old('campo2', $tag->campo2) }}">
</form>






<label for="color">Color:</label>
<select name="color" id="color" class="form-control">
    @foreach($colors as $key => $value)
    <option value="{{ $key }}" {{ old('color') == $key ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
</select>



value="{{ old('name', $category->name) }}"



<label for="">
    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
    {{ $tag->name }}
</label>




{!! Form::label( 'category_id','Categoria') !! }
{!! Form::select('category_id',$categories, null, ['class'=>'form-control'] ) !! }

<label for="category_id">Categoría</label>
<select name="category_id" class="form-control">
    @foreach($categories as $key => $value)
    <option value="{{ $key }}" {{ old('categories') == $key ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
</select>


<label for="">
    {!! Form::checkbox('tags[]',$tag->id, null) !!}
    {{$tag->name}}
</label>

<label for="">
    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
    {{ $tag->name }}
</label>



<div class="form-group">
    {!! Form::label( 'extract','Extracto') !! }
    {!! Form::textarea('extract', null, ['class'=>'form-control'] ) !! }
</div>

<div class="form-group">
    <label for="extract">Extracto</label>
    <textarea name="extract" class="form-control"></textarea>
</div>


<div>
    {!! Form::label( 'body','Cuerpo del post:') !! }
    {!! Form::textarea('body', null, ['class'=>'form-control'] ) !! }

</div>
{!! Form::submit('Crear post',['class'=>'btn btn-primary']) !!}


<div>
    <label for="body">Cuerpo del post:</label>
    <textarea name="body" class="form-control"></textarea>
</div>

<button type="submit" class="btn btn-primary">Crear post</button>



{{-- {!! Form::checkbox('tags[]',$tag->id, null)    !!}
                            {{$tag->name}} --}}

<label class="mr-2" for="">
    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
    {{ $tag->name }}
</label>
</label>
@endforeach

</div>

{{-- <div class="form-group">
                        {!! Form::label( 'extract','Extracto') !! }
                        {!! Form::textarea('extract', null, ['class'=>'form-control'] ) !! }
                    </div> --}}

<div class="form-group">
    <label for="extract">Extracto</label>
    <textarea name="extract" class="form-control"></textarea>
</div>


{{-- <div>
                        {!! Form::label( 'body','Cuerpo del post:') !! }
                        {!! Form::textarea('body', null, ['class'=>'form-control'] ) !! }
                        
                    </div>
                    {!!  Form::submit('Crear post',['class'=>'btn btn-primary'])      !!} --}}


<div>
    <label for="body">Cuerpo del post:</label>
    <textarea name="body" class="form-control"></textarea>
</div>

<button type="submit" class="btn btn-primary">Crear post</button>





<script>
    // Inicializar CKEditor 
    ClassicEditor
        .create(document.querySelector('textarea'))
        .then(extract => {
            console.log('Se inicializó el editor', extract);
        })
        .then(body => {
            console.log('Se inicializó el editor', body);
        })
        .catch(error => {
            console.error('Error durante la inicialización del editor', error);
        });
</script>




para poner el radio button de estado

<label for="">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="1" Borrador checked />
        <input class="form-check-input" type="radio" name="status" id="2" Publicado />

        <label class="form-check-label" for="">Borrador</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="" id="" checked disabled />
        <label class="form-check-label" for="">
            Default checked radio
        </label>
    </div>


</label>

<label>
    {!! Form::radio('status',1,true) !!}
    Publicado
</label>

<label>
    {!! Form::radio('status',2) !!}
    Borrador
</label>

<label>
    <input type="radio" name="status" value="1" checked>
    Publicado
</label>

<label>
    <input type="radio" name="status" value="2">
    Borrador
</label>
