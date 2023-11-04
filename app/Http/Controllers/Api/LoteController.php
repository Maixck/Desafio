<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lote;
use App\Models\Ciudad;
use App\Models\Propietario;
use App\Http\Resources\LoteCollection;
use App\Http\Resources\LoteResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $lotes = Lote::with('ciudad','propietario')->paginate();
        return (new LoteCollection($lotes))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'codigo' => 'bail|required|string|max:255',
            'valor' => 'bail|required|numeric|max_digits:16',
            'ciudad_id' => 'required|exists:ciudades,id',
            'propietario_id' => 'required|exists:propietarios,id',
        ]);

        $lote = Lote::create([
            'codigo' => $request->input('codigo'),
            'valor' => $request->input('valor'),
            'ciudad_id' => $request->input('ciudad_id'),
            'propietario_id' => $request->input('propietario_id'),
        ]);

//        Log::info("Lote ID {$lote->id} creado correctamente.");


        return (new LoteResource(Lote::where('id',$lote->id)->with('ciudad','propietario')->get()))->response()->setStatusCode(JsonResponse::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     */
    public function show(Lote $lote): JsonResponse
    {
        $id = $lote->id;
        return (new LoteResource(Lote::where('id',$id)->with('ciudad','propietario')->get()))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lote $lote): JsonResponse
    {

        $request->validate([
            'codigo' => 'bail|required|string|max:255',
            'valor' => 'bail|required|numeric|max_digits:16',
            'ciudad_id' => 'required|exists:ciudades,id',
            'propietario_id' => 'required|exists:propietarios,id',
        ]);

        $lote->codigo = $request->input('codigo');
        $lote->valor = $request->input('valor');
        $lote->ciudad_id = $request->input('ciudad_id');
        $lote->propietario_id = $request->input('propietario_id');
        $lote->save();

//        Log::info("Lote ID {$lote->id} actualizado correctamente.");
        return (new LoteResource(Lote::where('id',$lote->id)->with('ciudad','propietario')->get()))->response();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lote $lote): Response
    {
        //404 en el caso de que ya este borrado
        $lote->delete();

//        Log::info("Lote ID {$lote->id} borrado con exito.");
        return response(null, Response::HTTP_NO_CONTENT);
    }
}