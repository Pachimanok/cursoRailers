<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class contactoConteoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactos = Contacto::all();
        $hayalguno = $contactos->count();
        return view('contactos.index')->with('contactos',$contactos)->with('hayalguno',$hayalguno);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contactos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:contactos,email',
            'direccion' => 'nullable',
        ]);

        $contacto = new Contacto();
        $contacto->nombre = $request['nombre'];
        $contacto->telefono = $request['telefono'];
        $contacto->direccion = $request['direccion'];
        $contacto->email = $request['email'];

        $contacto->save();

        return redirect()->route('contactos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contacto = Contacto::find($id);
        return view('contactos.show')->with('contacto', $contacto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contacto = Contacto::find($id);
        return view('contactos.edit')->with('contacto', $contacto);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:contactos,email',
            'direccion' => 'nullable',
        ]);

        $contacto = Contacto::find($id);
        $contacto->nombre = $request['nombre'];
        $contacto->telefono = $request['telefono'];
        $contacto->direccion = $request['direccion'];
        $contacto->email = $request['email'];

        $contacto->save();
        return redirect()->route('contactos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contacto = Contacto::find($id);
        $contacto->delete();
        return redirect()->route('contactos.index');

    }
}
