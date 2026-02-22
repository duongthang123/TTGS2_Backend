<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalaryCft\CreateSalaryCftRequest;
use App\Http\Requests\SalaryCft\UpdateSalaryCftRequest;
use App\Http\Resources\SalaryCft\SalaryCftCollection;
use App\Http\Resources\SalaryCft\SalaryCftResource;
use App\Services\SalaryCft\SalaryCftService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalaryCftController extends Controller
{
    protected $salaryCftService;

    public function __construct(SalaryCftService $salaryCftService)
    {
        $this->salaryCftService = $salaryCftService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $salaryCfts = $this->salaryCftService->getAll($request->all());

        return (new SalaryCftCollection($salaryCfts))->additional([
            'message' => 'get salary_cfts success',
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSalaryCftRequest $request)
    {
        $salary = $this->salaryCftService->createSalaryCft($request->all());

        if ($salary) {
            return \response()->json([
                'data' => new SalaryCftResource($salary),
                'message' => 'create salary-cft success',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'create salary-cft fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salaryCft = $this->salaryCftService->getSalaryCftById($id);

        return \response()->json([
            'data' => new SalaryCftResource($salaryCft),
            'message' => 'get salary_cft success',
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaryCftRequest $request, string $id)
    {
        $salaryCft = $this->salaryCftService->updateSalaryCft($request->all(), $id);

        if ($salaryCft) {
            return \response()->json([
                'data' => new SalaryCftResource($salaryCft),
                'message' => 'update salary-cft success',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'update salary-cft fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->salaryCftService->deleteSalaryCftById($id);

        if ($result) {
            return \response()->json([
                'message' => 'delete salary_cft success',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'delete salary_cft fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
