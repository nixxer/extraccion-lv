<?php
// sustituir \ por el backslash

// agregar a routes/api.php
// Route::resource('medio', 'MedioController');


namespace App\Http\Controllers;
use App\Medio;
use Illuminate\Http\Request;
use App\Http\Resources\Medio as MedioResource;

class MedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Medio::paginate(10);

        return MedioResource::collection($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->isMethod('put')?Medio::
        findOrFail($request->medio_id):new Medio;
        $data->nombre = $request->input('nombre');
        $data->cantidad = $request->input('cantidad');
        $data->unidad = $request->input('unidad');
                 
        if($data->save()){
            return new MedioResource($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medio  $medio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Medio::findOrFail($id);
        return new MedioResource($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ Medio  $medio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Medio::findOrFail($id);
        $data->nombre = $request->input('nombre');
        $data->cantidad = $request->input('cantidad');
        $data->unidad = $request->input('unidad');
                
        if($data->save())
            return new MedioResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ Medio  $medio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Medio::findOrFail($id);
        if($data->delete()){
            return new TrabajadorResource($data);
       }
    }
}

    