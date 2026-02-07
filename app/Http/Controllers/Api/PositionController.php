<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Position\CreatePositionRequest;
use App\Http\Requests\Position\UpdatePositionRequest;
use App\Http\Resources\Position\PositionCollection;
use App\Http\Resources\Position\PositionResource;
use App\Services\Position\PositionService;
use Illuminate\Http\Response;

class PositionController extends Controller
{
    protected $positonService;

    public function __construct(PositionService $positionService)
    {
        $this->positonService = $positionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = $this->positonService->getAll();

        return (new PositionCollection($positions))->additional([
            'message' => 'get positions list success',
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePositionRequest $request)
    {
        $position = $this->positonService->createPosition($request->only('name'));

        return response()->json([
            'data' => new PositionResource($position),
            'message' => 'create position success',
            'status' => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $position = $this->positonService->findPositionById($id);

        return \response()->json([
            'data' => new PositionResource($position),
            'message' => 'get position success',
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, string $id)
    {
        $position = $this->positonService->updatePosition($request->only('name'), $id);
        if ($position) {
            return \response()->json([
                'data' => new PositionResource($position),
                'message' => 'update position success',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'update error',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->positonService->deletePosition($id);
        if ($result) {
            return \response()->json([
                'message' => 'delete position success',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'delete position error',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
