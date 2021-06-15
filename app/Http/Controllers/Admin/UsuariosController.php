<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\Estate;
use App\Models\City;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function dataTable() 
	{
		$today = now()->format('Y-m-d'); 

		$usuarios = DB::table('users as a')
		->select('a.*','b.nombre as nombre_rol','c.nombre as nombre_ciudad')
		->leftjoin('roles as b', 'a.id_role', '=', 'b.id')
		->leftjoin('cities as c', 'a.id_ciudad', '=', 'c.id');

		return DataTables::of($usuarios)
		->make(true);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('admin.usuarios');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$paises = Country::all();
        $estados = Estate::all();
        $ciudades = City::all();
		return view('admin.nuevo_usuario',compact('paises','estados','ciudades'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(UsuarioStoreRequest $request)
	{
		$user= new User();
		$user->nombre = $request->nombre;
		$user->cedula = $request->cedula;
		$user->celular = $request->telefono;
		$user->id_ciudad = $request->ciudad;
		$user->fecha_nacimiento = $request->fecha_nacimiento;
		$user->id_role = 2;//por defecto todos seran usuarios no administradores
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->save();
		return redirect()->route('usuarios admin')->with('status','Usuario creado exitosamente.');
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
		$usuario = User::where('id', $id)->firstOrFail();
		
		$paises = Country::all();
		$estados = Estate::all();
		$ciudades = City::all();
		return view('admin.editar_usuario',compact('estados','ciudades','paises','usuario'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UsuarioUpdateRequest $request, $id)
	{
		$user = User::findOrFail($id);
		$user->nombre = $request->nombre;
		$user->celular = $request->telefono;
		$user->id_ciudad = $request->ciudad;
		$user->fecha_nacimiento = $request->fecha_nacimiento;
		$user->save();
		return redirect()->route('usuarios admin')->with('status','Usuario actualizado exitosamente.');
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$usuario = User::findOrFail($id);
		if($usuario != null){
			if($usuario->role->nombre == 'admin'){
				return response()->json([
					'status' => 0,
					'message' => 'No puede eliminar un usuario administrador!'
				]); 
			}else{
				$usuario->forceDelete();
			}
			
		}else{
			return response()->json([
				'status' => 0,
				'message' => 'Usuario no encontrado!'
			]); 
		}
		

		return response()->json([
			'status' => 1,
			'message' => 'El usuario ha sido eliminado!'
		]);
	}

}
