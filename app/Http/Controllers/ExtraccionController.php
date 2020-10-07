<?php
// sustituir \ por el backslash

// agregar a routes/api.php
// Route::resource('extraccion', 'ExtraccionController');


namespace App\Http\Controllers;
use App\Extraccion;
use Illuminate\Http\Request;
use App\Http\Resources\Extraccion as ExtraccionResource;

class ExtraccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ^Illuminate^Http^Response
     */
    public function index()
    {
        $data = Extraccion::paginate(10);

        return ExtraccionResource::collection($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ^Illuminate^Http^Request  $request
     * @return ^Illuminate^Http^Response
     */
    public function store(Request $request)
    {
        
        $data = $request->isMethod('put')?Extraccion::
        findOrFail($request->extraccion_id):new Extraccion;
        $data->fecha = $request->input('fecha');
        $data->cantidad = $request->input('cantidad');
        $data->lugar = $request->input('lugar');
        $data->observaciones = $request->input('observaciones');
        $data->trabajador_id = $request->input('trabajador_id');
        $data->medio_id = $request->input('medio_id');
                 
        if($data->save()){
            return new ExtraccionResource($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  ^App^Extraccion  $extraccion
     * @return ^Illuminate^Http^Response
     */
    public function show($id)
    {
        $data = Extraccion::findOrFail($id);
        return new ExtraccionResource($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ^Illuminate^Http^Request  $request
     * @param  ^App^ Extraccion  $extraccion
     * @return ^Illuminate^Http^Response
     */
    public function update(Request $request,$id)
    {
        $data = Extraccion::findOrFail($id);
        $data->fecha = $request->input('fecha');
        $data->cantidad = $request->input('cantidad');
        $data->lugar = $request->input('lugar');
        $data->observaciones = $request->input('observaciones');
        $data->trabajador_id = $request->input('trabajador_id');
        $data->medio_id = $request->input('medio_id');
                
        if($data->save())
            return new ExtraccionResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ^App^ Extraccion  $extraccion
     * @return ^Illuminate^Http^Response
     */
    public function destroy($id)
    {
        $data = Extraccion::findOrFail($id);
        if($data->delete()){
            return new TrabajadorResource($data);
       }
    }
}


    