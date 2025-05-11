<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    public function index(Request $request) {
        
    $classId = $request->input('class_id'); // Obtém o class_id enviado via AJAX

    // Verifica se o class_id foi passado
    if ($classId) {
        // Filtra as espécies com base no class_id
        $species = Specie::where('class_id', $classId)->get(['id', 'name']);
    } else {
        $species = []; // Se não houver class_id, retorna um array vazio
    }

    // Retorna as espécies como JSON
    return response()->json($species);
    }
}
