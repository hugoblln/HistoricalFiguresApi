<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use App\Http\Resources\DomainResource;
use App\Http\Requests\DomainCreateRequest;
use App\Http\Requests\DomainUpdateRequest;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domains = Domain::All();

        return DomainResource::collection($domains);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DomainCreateRequest $request)
    {
       $validatedData = $request->validated();

       $domain = Domain::create($validatedData);

       return response()->json([
           'message' => 'Domain created successfully',
           'domain' => new DomainResource($domain)
       ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Domain $domain)
    {
        return new DomainResource($domain);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(DomainUpdateRequest $request, Domain $domain)
    {
       $validatedData = $request->validated();

       $domain->update($validatedData);

       return response()->json([
           'message' => 'Domain updated successfully',
           'domain' => new DomainResource($domain)
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        $domain->forceDelete();

        return response()->json([
            'message' => 'Domain deleted successfully'
        ]);
    }
}
