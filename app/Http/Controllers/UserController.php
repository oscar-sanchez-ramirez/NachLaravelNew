<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $usuarios = User::paginate(10);
        toast('Lista de usuarios', 'success')->timerProgressBar();
        return view('usuarios', compact('usuarios'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}