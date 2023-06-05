<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{

    public function enviarCorreo(Request $request)
    {

        $data = [
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'asunto' => $request->input('asunto'),
            'mensaje' => $request->input('mensaje')
        ];

        Mail::send('web.correo', $data, function ($message) use ($data) {
            $message->to('plantoring@gmail.com', 'Destinatario');
            $message->from('plantoring@gmail.com', $data['nombre']);
            $message->subject($data['asunto']);
        });

        return redirect()->back()->with('success', '¡Correo enviado correctamente!');
    }
}
