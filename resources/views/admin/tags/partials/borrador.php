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