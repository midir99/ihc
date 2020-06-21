<?php

namespace App\Http\Controllers;
use App\User; //Decir que entidad usará
use Auth;


use Illuminate\Http\Request;
use App\Http\Requests\cambiarclaveRequest;
use Illuminate\Support\Facades\Hash;
//use Mail;
use App\Notifications\codigo_confirmacion;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("User.cuenta"); 
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

    public function cambiarclave(cambiarclaveRequest $request)
    {
        //Cambiar contraseña
        $user= auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route("home")->with("message","¡Contraseña actualizada correctamente!");
        
    }

    public function verificar($code)
    {
        $user = User::where('confirmation_code', $code)->first();

        if (! $user)
            return redirect('/');

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/home')->with('message', 'Has confirmado correctamente tu correo!');
    }

    public function reenviar(){
        $data['confirmation_code'] = auth::user()->confirmation_code;
        $data['name'] = auth::user()->name;
        $data['email'] = auth::user()->email;

        // Mandar correo
        //Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
        //    $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
        //});
        $correo= [ 'name' => auth::user()->name, 'codigo' => $data['confirmation_code']];
        \Notification::route('mail',$data['email'])->notify(new codigo_confirmacion($correo));

        return redirect('/home')->with('reenvio', 'Correo de verificación reenviado!');
    }
    
}
