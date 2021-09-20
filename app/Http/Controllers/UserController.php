<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\UsersExport;
use App\Http\Requests\UserRequest;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        toast('Lista de usuarios', 'success')->timerProgressBar();
        return view('usuarios');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-outline-info btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-outline-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function listado()
    {
        $users = User::all();
        Alert::success('Usuarios', 'Lista');
        return view('users', compact('users'));
    }


    public function test()
    {
        $users = User::all();
        return response()->json([
            'status' => 'ok',
            'msj' => 'usuarios de pirita',
            'data' => $users
        ], 200);
    }

    public function testPost(UserRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors->toJson();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'ok',
            'msj' => 'usuario de pirita creado',
            'data' => $user
        ]);
    }
}
