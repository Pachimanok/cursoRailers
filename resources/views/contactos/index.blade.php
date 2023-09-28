@extends('layouts.app')

@section('content')
<a href="{{ route('contactos.create') }}" class="btn btn-primary mb-3">Añadir Contacto</a>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @if($hayalguno == 0 )
        <p class="text-center">NO tenes contaactos</p>
        @else
        @foreach ($contactos as $contacto )
            

        <tr>
            <td>{{ $contacto->nombre }}</td>
            <td>{{ $contacto->telefono }}</td>
            <td>{{ $contacto->email }}</td>
            <td>{{ $contacto->algo }}</td>

            <td>
                <a href="{{ route('contactos.show', $contacto->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
