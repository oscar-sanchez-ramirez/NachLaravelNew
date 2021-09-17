<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

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
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
