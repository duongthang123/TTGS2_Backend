<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\CreateUnitRequest;
use App\Http\Requests\Unit\UpdateUnitRequest;
use App\Http\Resources\Unit\UnitCollection;
use App\Http\Resources\Unit\UnitResource;
use App\Services\Unit\UnitService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UnitController extends Controller
{
    protected $unitService;

    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = $this->unitService->getAll();

        return (new UnitCollection($units))->additional([
            'message' => 'get all unit success',
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUnitRequest $request)
    {
        $data = $request->only('code', 'name', 'leader_id');
        $unit = $this->unitService->createUnit($data);

        return response()->json([
            'data' => new UnitResource($unit),
            'message' => 'create unit success',
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unit = $this->unitService->findUnitById($id);

        return \response()->json([
            'data' => new UnitResource($unit),
            'message' => 'get unit success',
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, string $id)
    {
        $data = $request->only('code', 'name', 'leader_id');
        $unit = $this->unitService->updateUnit($data, $id);

        if ($unit) {
            return \response()->json([
                'data' => new UnitResource($unit),
                'message' => 'update unit success',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'update unit fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->unitService->deleteUnit($id);

        if ($result) {
            return \response()->json([
                'message' => 'delete unit success',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'delete unit fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
