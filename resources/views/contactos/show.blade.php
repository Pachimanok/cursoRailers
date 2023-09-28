@extends('layouts.app')

@section('content')
<h2>Detalle de Contacto</h2>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $contacto->nombre }}</h4>
        <p><strong>Teléfono:</strong> {{ $contacto->telefono }}</p>
        <p><strong>Email:</strong> {{ $contacto->email }}</p>
        <p><strong>User:</strong> {{ $contacto->algo }}</p>
        <p><strong>Dirección:</strong> {{ $contacto->direccion }}</p>
    </div>
</div>
<a href="{{ route('contactos.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
@endsection
