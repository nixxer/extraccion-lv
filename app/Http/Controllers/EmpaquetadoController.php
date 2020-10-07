<?php
// sustituir \ por el backslash

// agregar a routes/api.php
// Route::resource('empaquetado', 'EmpaquetadoController');


namespace App\Http\Controllers;
use App\Empaquetado;
use Illuminate\Http\Request;
use App\Http\Resources\Empaquetado as EmpaquetadoResource;

class EmpaquetadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Empaquetado::paginate(10);

        return EmpaquetadoResource::collection($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->isMethod('put')?Empaquetado::
        findOrFail($request->empaquetado_id):new Empaquetado;
        $data->cantidad = $request->input('cantidad');
                 
        if($data->save()){
            return new EmpaquetadoResource($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empaquetado  $empaquetado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Empaquetado::findOrFail($id);
        return new EmpaquetadoResource($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ Empaquetado  $empaquetado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Empaquetado::findOrFail($id);
        $data->cantidad = $request->input('cantidad');
                
        if($data->save())
            return new EmpaquetadoResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ Empaquetado  $empaquetado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Empaquetado::findOrFail($id);
        if($data->delete()){
            return new TrabajadorResource($data);
       }
    }
}

    