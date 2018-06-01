<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use DB;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $statusCode  = 200;
    public $result      = false;
    public $message     = 'Error al procesar solicitud';
    public $records     =  array();

    public function index()
    {
        try{
            $tables = Table::where('available', 1)->get();

            if($tables){
                $this->statusCode = 200;
                $this->result     = true;
                $this->message    = 'Success';
                $this->records    = $tables;
            }else{
                $this->statusCode = 200;
                $this->result     = false;
                $this->message    = 'No se han creado mesas';
            }
        }catch(\Exception $ex){
            $this->statusCode = 200;
            $this->result     = false;
            $this->message    = env('APP_DEBUG') ? $e->getMessage() : $this->message;
        }finally{
            $response=[
                'message'     => $this->message,
                'result'      => $this->result,
                'records'     => $this->records
            ];
            return response()->json($response, $this->statusCode);
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $nuevoRegistro = DB::transaction(function() use ($request)
            {

                $nuevoRegistro = Table::create(
                    [
                        'code'         => $request->input('code'),
                        'available'  => $request->input('available')
                    ]);

                if(!$nuevoRegistro)
                {
                    throw new \Exception('Ha ocurrido un error');
                }
                else
                {
                    return $nuevoRegistro;
                }
            });

            $this->statusCode = 200;
            $this->message    = "El registro se creó correctamente";
            $this->result     = true;
            $this->records    = $nuevoRegistro;
        }
        catch(\Exception $ex)
        {
            $this->statusCode = 200;
            $this->message    = 'Algo salió mal';
            $this->result     = false;
        }
        finally
        {
            $response =
            [
                'message' => $this->message,
                'result'  => $this->result,
                'records' => $this->records,
            ];
            return response()->json($response, $this->statusCode);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
