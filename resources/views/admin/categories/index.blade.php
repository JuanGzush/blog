@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Categorías.</h1>
@stop

@section('content')
@if (session('info'))
<div class="aler alert-success">
    <strong>{{ session('info')}}</strong>
</div>
    
@endif



    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary " href="{{route('admin.categories.create')}}">Agregar categoría</a>
        </div>


        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>Name </th>
                        <th colspan="2"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }} </td>
                            <td>{{ $category->name }} </td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category) }} ">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
