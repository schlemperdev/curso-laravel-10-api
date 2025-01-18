<?php

namespace App\Http\Controllers\API;

use App\DTOs\Supports\CreateSupportDTO;
use App\DTOs\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Http\Resources\SupportResource;
use App\Services\SupportServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupportControllerAPI extends Controller
{

    public function __construct(
        protected SupportServices $service
    ) {}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupport $request)
    {
        $support = $this->service->new(
            CreateSupportDTO::fromRequest($request)
        );

        return new SupportResource($support);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (! $support = $this->service->findOne($id)) {
            return response()->json(['error' => 'Support not found'], 404);
        }

        return new SupportResource($support);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSupport $request, string $id)
    {
       $support = $this->service->update(
            UpdateSupportDTO::fromRequest($request, $id)
        );

        if (!$support) {
            return response()->json(['error' => 'Support not found'], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json(['error' => 'Support not found'], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
