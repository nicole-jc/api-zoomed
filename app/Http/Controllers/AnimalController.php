<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use App\Models\Classes;
use Exception;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function store(AnimalRequest $request) {

    try {
        // Registrando animal
        Animal::create([
            'name' => $request->name,
            'description' => $request->description,
            'birthdate' => $request->birthdate,
            'class_id' => $request->class_id,
            'specie_id' => $request->specie_id,
            'habitat' => $request->habitat,
            'country' => $request->country
    ]);

        return redirect()->route('animal.create.view')->with('success', 'Animal cadastrado com sucesso!');
    } 
        // retornando erros
        catch(Exception $e) {
        return back()->withInput()->with('error', 'Falhamos ao tentar registrar o animal.');
    }
}

    public function index() {

        $animals = DB::table('animals')
        ->join('species', 'animals.specie_id', '=', 'species.id')  // Join com species
        ->join('classes', 'animals.class_id', '=', 'classes.id')   // Join com classes
        ->select('animals.*', 'species.name as specie_name', 'classes.name as class_name') // Selecionando todos os campos de animals e o nome da espécie
        ->get();

        // Retorno 
        return view('animals.animals_list', compact('animals'));
    }

    public function show(Animal $animal) {

         $animal = DB::table('animals')
        ->join('species', 'animals.specie_id', '=', 'species.id')
        ->join('classes', 'animals.class_id', '=', 'classes.id')
        ->select(
            'animals.*', 
            'species.name as specie_name', 
            'species.id as specie_id',
            'classes.name as class_name', 
            'classes.id as class_id')
        ->where('animals.id', '=', $animal->id)
        ->first();

    $classes = Classes::all();

    return view('animals.animals_update', compact('animal', 'classes'));
}

    public function update(AnimalRequest $request, Animal $animal) {

        try {
        // Editando informacoes no DB
        $animal->update([
            'name' => $request->name,
            'description' => $request->description,
            'birthdate' => $request->birthdate,
            'class_id' => $request->class_id,
            'specie_id' => $request->specie_id,
            'habitat' => $request->habitat,
            'country' => $request->country
        ]);

            return redirect()->route('animal.update.view', $animal->id)->with('success', 'Dados do animal atualizados com sucesso!');
        }

     catch (Exception $e) {
        // Retornando erros
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        
    }

}

public function destroy(Animal $animal) {

    $animal->delete();

            return redirect()->route('animal.list')->with('success', 'Animal deletado com sucesso!');
        }
    }


