<?php
// sustituir \ por el backslash

// agregar a routes/api.php
// Route::resource('caja', 'CajaController');


namespace App\Http\Controllers;
use App\Caja;
use Illuminate\Http\Request;
use App\Http\Resources\Caja as CajaResource;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Caja::paginate(10);

        return CajaResource::collection($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->isMethod('put')?Caja::
        findOrFail($request->caja_id):new Caja;
        $data->no = $request->input('no');
        $data->ubicacion = $request->input('ubicacion');
                 
        if($data->save()){
            return new CajaResource($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Caja::findOrFail($id);
        return new CajaResource($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Caja::findOrFail($id);
        $data->no = $request->input('no');
        $data->ubicacion = $request->input('ubicacion');
                
        if($data->save())
            return new CajaResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Caja::findOrFail($id);
        if($data->delete()){
            return new TrabajadorResource($data);
       }
    }
}

    