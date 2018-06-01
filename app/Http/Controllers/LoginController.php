<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
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
        //
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
        //
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

    public function login(Request $request){

        try{

            $user = User::where('username', $request->get('username'))->first();

            //dd($user->password);
            if($user){
               if($request->get('password') == $user->password){
                    $this->statusCode = 200;
                    $this->result     = true;
                    $this->message    = 'Usuario y contrasenia correctos';
                    $this->records    = $user;
                }else{
                    $this->statusCode = 200;
                    $this->result     = false;
                    $this->message    = 'Contrasenia incorrecta';
                }
            }else{
                $this->statusCode   = 200;
                $this->result       = false;
                $this->message      = 'El usuario no existe';
            }
        }catch(\Exception $ex){
            $this->statusCode   = 200;
            $this->result       = false;
            $this->message      = env('APP_DEBUG') ? $e->getMessage() : $this->message;
        }finally{
            $response=[
                'message'       => $this->message,
                'result'        => $this->result,
                'records'       => $this->records
            ];
            return response()->json($response, $this->statusCode);
        }    
        
    }
}
