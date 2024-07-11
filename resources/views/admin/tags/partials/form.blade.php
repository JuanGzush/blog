<div class="form-group">
    <label for="name" class="">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tag->name) }}"
        placeholder="Ingrese el nombre de la etiqueta" required>

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <label for="slug" class="mt-4">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control disabled" value="{{ old('name', $tag->slug) }}"
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

 {{--    <label for="color">Color:</label>
    <select name="color" id="color" class="form-control">
        @foreach ($colors as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    @error('color')
        <small class="text-danger">{{ $message }}</small>
    @enderror
 --}}
    <label for="color">Color:</label>
<select name="color" id="color" class="form-control">
    @foreach($colors as $key => $value)
        <option value="{{ $key }}" {{ old('color') == $key ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
</select>
@error('color')
<small class="text-danger">{{ $message }}</small>
@enderror







</div>

    