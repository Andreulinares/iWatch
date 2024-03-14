<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validar si hay archivos enviados
        if ($request->hasFile('demo')) {
            $file = $request->file('demo');

            // Validar si la carga del archivo fue exitosa
            if ($file->isValid()) {
                // Obtener el nombre original del archivo
                $filename = $file->getClientOriginalName();

                // Mover el archivo a una ubicación específica
                $file->move(public_path('videos'), $filename);

                // Devolver una respuesta exitosa
                return response()->json(['success' => true, 'message' => 'Archivo subido correctamente']);
            } else {
                // Si la carga del archivo no fue exitosa, devolver un error
                return response()->json(['success' => false, 'message' => 'Error al cargar el archivo'], 400);
            }
        } else {
            // Si no se envió ningún archivo, devolver un error
            return response()->json(['success' => false, 'message' => 'No se ha enviado ningún archivo'], 400);
        }
    }
}
