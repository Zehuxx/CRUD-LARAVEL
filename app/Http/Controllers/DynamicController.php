<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\City;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
    CONTROLADOR QUE DEVUELVE LOS ESTADOS Y CIUDADES EN BASE AL PAIS, ESTADO RESPECTIVAMENTE
*/

class DynamicController extends Controller
{
    public function fetchEstados(Request $request){
        $pais = $request->get('pais');
        
        $data = $estados = Estate::orderBy('nombre','asc')
        ->where("id_pais","=",$pais)
        ->get();
        response()->json($data);
        if (count($data)==0){
        	$output = '<option value="">Ningún estado encontrado</option>';
        }else{
        	$output = '<option value="">Seleccione el estado</option>';
        }
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
        }
        echo $output;
    }

    public function fetchCiudades(Request $request){
        $estado = $request->get('estado');
        
        $data = $ciudades = City::orderBy('nombre','asc')
        ->where("id_estado","=",$estado)
        ->get();
        response()->json($data);
        if (count($data)==0){
        	$output = '<option value="">Ninguna ciudad encontrada</option>';
        }else{
        	$output = '<option value="">Seleccione la ciudad</option>';
        }
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
        }
        echo $output;
    }
}