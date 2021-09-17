<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('txtBuscar') && $request->has('txtBuscar') != '') {
            $users = User::where('name', 'like', '%' . $request->txtBuscar . '%')
                ->orWhere('email', 'like', '%' . $request->txtBuscar . '%')
                ->get();
        } else {
            $users = User::all();
        }

        return response()->json([
            'data' => $users,
            'msg' => 'Registros de usuarios'
        ], 200);
    }

    public function usuarios()
    {
        $usuarios = User::all();
        //  toast('Usuarios!','success');
        // example:
        // example:
        // example:
        toast('Signed in successfully', 'success')->timerProgressBar();

        return view('usuarios', compact('usuarios'));
    }
}
