<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lote;
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
        $lotes = Lote::paginate();
        return (new LoteCollection($lotes))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'bail|required|string|max:255',
            'valor' => 'bail|required|numeric|max_digits:16',
        ]);

        $lote = Lote::create([
            'codigo' => $request->input('codigo'),
            'valor' => $request->input('valor'),
        ]);

//        Log::info("Lote ID {$lote->id} creado correctamente.");

        return (new LoteResource($lote))->response()->setStatusCode(JsonResponse::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     */
    public function show(Lote $lote)
    {
        return (new LoteResource($lote))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lote $lote): JsonResponse
    {
        $request->validate([
            'codigo' => 'bail|required|string|max:255',
            'valor' => 'bail|required|numeric|max_digits:16',
        ]);
        $lote->codigo = $request->input('codigo');
        $lote->valor = $request->input('valor');
        $lote->save();

//        Log::info("Lote ID {$lote->id} actualizado correctamente.");

        return (new LoteResource($lote))->response();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lote $lote): Response
    {
        $lote->delete();

//        Log::info("Lote ID {$lote->id} borrado con exito.");

        return response(null, Response::HTTP_NO_CONTENT);
    }
}