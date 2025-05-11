<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareRequest;
use App\Models\Cares;
use Exception;

class CareController extends Controller
{
    public function store(CareRequest $request)
    {

    try {
        // Registrando o cuidado no banco de dados
        Cares::create([
            'name' => $request->name,
            'description' => $request->description,
            'frequency' => $request->frequency,
        ]);

        return redirect()->route('care.create.view')->with('success', 'Cuidado registrado com sucesso.');
        
    } catch (Exception $e) {

        return redirect()->back()->with('error', $e->getMessage());
    }
}

public function index() {
 
    $cares = Cares::orderBy('id')->get();

    return view('care.care_list', ['cares' => $cares]);
}

public function show(Cares $care) {

    return view('care.care_update', ['care' => $care]);
}

public function update(CareRequest $request, Cares $care) {

     try {
        // Edit info in DB
        $care->update([
            'name' => $request->name,
            'description' => $request->description,
            'frequency' => $request->frequency
        ]);

            return redirect()->route('care.update.view', $care->id)->with('success', 'Cuidado atualizado com sucesso!');
        }

    catch (Exception $e) {

            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

public function destroy(Cares $care) {
    $care->delete();

            return redirect()->route('care.list')->with('success', 'Cuidado deletado com sucesso!');
        }
    }

