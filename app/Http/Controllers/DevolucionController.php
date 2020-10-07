<?php


namespace App\Http\Controllers;
use App\Devolucion;
use Illuminate\Http\Request;
use App\Http\Resources\Devolucion as DevolucionResource;

class DevolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ^Illuminate^Http^Response
     */
    public function index()
    {
        $data = Devolucion::paginate(10);

        return DevolucionResource::collection($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ^Illuminate^Http^Request  $request
     * @return ^Illuminate^Http^Response
     */
    public function store(Request $request)
    {
        
        $data = $request->isMethod('put')?Devolucion::
        findOrFail($request->devolucion_id):new Devolucion;
        $data->cantidad = $request->input('cantidad');
        $data->observaciones = $request->input('observaciones');
        $data->extraccion_id = $request->input('extraccion_id');
                 
        if($data->save()){
            return new DevolucionResource($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  ^App^Devolucion  $devolucion
     * @return ^Illuminate^Http^Response
     */
    public function show($id)
    {
        $data = Devolucion::findOrFail($id);
        return new DevolucionResource($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ^Illuminate^Http^Request  $request
     * @param  ^App^ Devolucion  $devolucion
     * @return ^Illuminate^Http^Response
     */
    public function update(Request $request,$id)
    {
        $data = Devolucion::findOrFail($id);
        $data->cantidad = $request->input('cantidad');
        $data->observaciones = $request->input('observaciones');
        $data->extraccion_id = $request->input('extraccion_id');
                
        if($data->save())
            return new DevolucionResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ^App^ Devolucion  $devolucion
     * @return ^Illuminate^Http^Response
     */
    public function destroy($id)
    {
        $data = Devolucion::findOrFail($id);
        if($data->delete()){
            return new TrabajadorResource($data);
       }
    }
}

    