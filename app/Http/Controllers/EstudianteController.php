<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Validator;

class EstudianteController extends Controller
{
    
    //READ crear funcion para extraer estudiantes
    public function selecStudent(){
        $estudiantes = Estudiante::all();

        if($estudiantes->count()>0){
            return response()->json([
                'code'=> 200,
                'data'=> $estudiantes,
            ], 200);
        }else{
            return response()->json([
                'code'=> 404,
                'data'=> 'No hay registros',
            ], 404);
        }
    }

    //Buscar estudiante
    public function findStudent($id){
        //buscar
        $estudiante = Estudiante::find($id);
        if($estudiante){
            return response()->json([
                'code' => 200,
                'data' => $estudiante
            ], 200);
        }else{
            return response()->json([
                'code'=> 404,
                'data'=> 'Estudiante no encontrado',
            ], 404);
        }
    }

    //CREATE  funcion para almacenar nuevos estudiantes
    public function storeStudent(Request $request){
       
        $validacion = Validator::make($request->all(),[
            'nombre' => 'required',
            'edad' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
        ]);

        if($validacion->fails()){
            return response()->json([
                'code' => 400,
                'data' => $validacion->messages()
            ], 400);
        }else{
            $estudiante = Estudiante::create($request->all());

            return response()->json([
                'code' => 200,
                'data' => 'Estudiante insertado'
            ], 200);
        }
    }

    //UPDATE función para actualizar los datos de un estudiante existente
    public function updateStudent(Request $request)
    {
        $user = User::find($request->id);
        if($user){

            $user->fill($request->all());
            $user->update();

            return response()->json([
                'code' => 200,
                'data' => 'Estudiante insertado'
            ], 200);

        }else{

             return response()->json([
            'code' => 404,
            'data' => 'Estudiante no encontrado'
        ], 404);
        }

    }





    //DELETE función para eliminar un estudiante existente
    public function destroyStudent($id){
        $estudiante = Estudiante::find($id);
        if($estudiante){
            $estudiante->delete();
            return response()->json([
                'code' => 200,
                'data' => 'Estudiante eliminado'
            ], 200);
        }else{
            return response()->json([
                'code' => 404,
                'data' => 'Estudiante no encontrado'
            ], 404);
        }
    }

}


