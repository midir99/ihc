<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baja; //Decir que entidad usará
use App\User; //Decir que entidad usará
use Auth;
use Mail;
use App\Notifications\cuenta_eliminada;

class BajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Baja.cuenta"); 
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
        $correo= [ 'name' => auth::user()->name ];

        // Mandar correo
        //Mail::send('emails.cuenta_eliminada', $data, function($message) use ($data) {
        //    $message->to($data['email'], $data['name'])->subject('Notificación de cuenta');
        //});
        #$user = User::select("email")->get();
        $user = new User;
        $user->email = auth::user()->email;
        \Notification::send($user, new cuenta_eliminada($correo));

        // Registrar respuesta
        $baja = new Baja;
        $baja->email = auth()->user()->email;
        $baja->motivo = $request->motivo;
        $baja->save();
        // Eliminar cuenta
        $user = User::find(auth()->user()->id);
	    $user->delete();
        return redirect()->route("login")->with("message","Cuenta eliminada");
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
