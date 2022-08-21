<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Mail\ListadoEmail;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincias = Provincia::all();

        $details = [
            'title' => 'Listado enviado: ',
            'body' => $provincias
            ];

            Mail::to('florenciaescobarlevi@gmail.com')->send(new ListadoEmail($details));

        return response()->json($provincias); 

       /**  return response()->json(
          *  [
            *'mensaje' => 'Listado de provincias',            
         *   'data' => $provincias
         *   ]
        *);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$provincias = Provincia::select('name')->get();
        // esto es equivalente a hacerlo en myAdmin -> SELECT nombre FROM provincias;


        //si en lugar de poner :select'name' pongo :select all() - el equivalente seria : SELECT * FROM provincias;
        $provincias = Provincia::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $provincia = Provincia::create([
            'nombre' => $request['nombre'],
            'indec_id' => $request['indec']
            
        ]);

        $details = [
            'title' => 'Se ha registrado una nueva provincia: ',
            'body' => $provincia->nombre
            ];

            Mail::to('florenciaescobarlevi@gmail.com')->send(new ContactEmail($details));

        return response ([
            'mensaje' => 'La provincia se agrego correctamente',
            'data' => $provincia
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(Provincia $provincia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(Provincia $provincia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $provincia = Provincia::findOrFail($id);

        $provincia -> nombre = $request ['nombre'];

        $provincia -> save(); 

        return response()->json([
            'mensaje' => 'la actualizacion fue realizada correctamente',
            'data' =>$provincia
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $provincia = Provincia::findOrFail($id);

        $provincia -> delete();

        return response()->json([
            'mensaje' => 'se haeliminado la provincia correctamente',
            'data' => $provincia
        ]);
    }

    public function getProvincia()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://apis.datos.gob.ar/georef/api/municipios?provincia=22&campos=id,nombre&max=100');
        
        return 'hola';
    }
}