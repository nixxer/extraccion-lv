<?php
// sustituir \ por el backslash

// agregar a routes/api.php
// Route::resource('trabajador', 'TrabajadorController');


namespace App\Http\Controllers;
use App\Trabajador;
use App\Extraccion;
use App\Develucion;
use Illuminate\Http\Request;
use App\Http\Resources\Trabajador as TrabajadorResource;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Trabajador::paginate(10);
        return TrabajadorResource::collection($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->isMethod('put')?Trabajador::
        findOrFail($request->trabajador_id):new Trabajador;
        
       // $data = $request->only(['nombre','apellido','observaciones']);
       
        $data->nombre = $request->input('nombre');
        $data->apellido = $request->input('apellido');
        $data->observaciones = $request->input('observaciones');
                 
        if($data->save()){
            return new TrabajadorResource($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Trabajador::findOrFail($id);
        return new TrabajadorResource($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Trabajador::findOrFail($id);
        $data->nombre = $request->input('nombre');
        $data->apellido = $request->input('apellido');
        $data->observaciones = $request->input('observaciones');
                
        if($data->save())
            return new TrabajadorResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Trabajador::findOrFail($id);
        if($data->delete()){
            return new TrabajadorResource($data);
       }
    }

    public function extracciones($id)
    {
    $trab = Trabajador::find($id);    
    $data = Trabajador::find($id)->medios;
    $result = [];

    foreach($data as $d) {
        $test = [];
        $test['nombre_trabajador'] = $trab->nombre;    
        $test['nombre_medio'] = $d->nombre;
        $test['cantidad'] = $d->pivot->cantidad;
        $test['lugar'] = $d->pivot->lugar;
        $test['devuelto'] = Extraccion::find( $d->pivot->id)->devolucion;        

        $result[]=$test;

    } 
    
    return $result;
    }
}

    