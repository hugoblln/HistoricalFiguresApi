<?php

namespace App\Http\Controllers;

use App\Models\Figure;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\FigureResource;
use App\Http\Requests\FigureCreateRequest;
use App\Http\Requests\FigureUpdateRequest;

class FigureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Gate::authorize('viewAny', Figure::class);

        $figures = Figure::all();

        return FigureResource::collection($figures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FigureCreateRequest $request)
    {

        Gate::authorize('create', Figure::class);

        $validatedData = $request->validated();

        $figure = Figure::create($validatedData);

        return \response()->json([
            'message' => 'Figure created successfully',
            'figure' => new FigureResource($figure)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Figure $figure)
    {
        Gate::authorize('view', $figure);

        return new FigureResource($figure);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FigureUpdateRequest $request,Figure $figure)
    {

        Gate::authorize('update', $figure);

        $validatedData = $request->validated();

        $figure->update($validatedData);

        return \response()->json([
            'message' => 'Figure updated successfully',
            'figure' => new FigureResource($figure)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Figure $figure)
    {  
        Gate::authorize('delete', $figure);

        $figure->forceDelete();

        return response()->json([
            'message' => 'Figure deleted successfully'
        ]);
    }
}
