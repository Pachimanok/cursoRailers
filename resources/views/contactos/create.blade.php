@extends('layouts.app')

@section('content')
<h2>{{ isset($contacto) ? 'Editar Contacto' : 'Nuevo Contacto' }}</h2>

<form action="{{ isset($contacto) ? route('contactos.update', $contacto->id) : route('contactos.store') }}" method="POST">
    @csrf
    @if(isset($contacto))
        @method('PUT')
    @endif

    <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" value="{{ isset($contacto) ? $contacto->nombre : '' }}" required>
    </div>

    <div class="form-group">
        <label>Teléfono:</label>
        <input type="text" name="telefono" class="form-control" value="{{ isset($contacto) ? $contacto->telefono : '' }}" required>
    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" value="{{ isset($contacto) ? $contacto->email : '' }}" required>
    </div>

    <div class="form-group">
        <label>Dirección:</label>
        <textarea name="direccion" class="form-control">{{ isset($contacto) ? $contacto->direccion : '' }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($contacto) ? 'Actualizar' : 'Guardar' }}</button>
</form>
@endsection
