<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prisoner\CreatePrisonerRequest;
use App\Http\Requests\Prisoner\UpdatePrisonerRequest;
use App\Http\Resources\Prisoner\PrisonerCollection;
use App\Http\Resources\Prisoner\PrisonerResource;
use App\Services\Prisoner\PrisonerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrisonerController extends Controller
{
    protected $prisonerService;

    public function __construct(PrisonerService $prisonerService)
    {
        $this->prisonerService = $prisonerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prisoners = $this->prisonerService->getAll($request->all());

        return (new PrisonerCollection($prisoners))->additional([
            'message' => 'get all prisoner success',
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePrisonerRequest $request)
    {
        $prisoner = $this->prisonerService->createPrisoner($request->all());

        return response()->json([
            'data' => new PrisonerResource($prisoner),
            'message' => 'create prisoner success',
            'status' => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prisoner = $this->prisonerService->getById($id);

        return response()->json([
            'data' => new PrisonerResource($prisoner),
            'message' => 'get prisoner success',
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrisonerRequest $request, string $id)
    {
        $prisoner = $this->prisonerService->updatePrisoner($request->all(), $id);

        if ($prisoner) {
            return response()->json([
                'data' => new PrisonerResource($prisoner),
                'message' => 'update prisoner success',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'update prisoner error',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->prisonerService->deletePrisoner($id);

        if ($result) {
            return response()->json([
                'message' => 'delete prisoner success',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'delete prisoner error',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
