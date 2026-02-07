<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rank\CreateRankRequest;
use App\Http\Requests\Rank\UpdateRankRequest;
use App\Http\Resources\Rank\RankCollection;
use App\Http\Resources\Rank\RankResource;
use App\Services\Rank\RankService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RankController extends Controller
{
    protected $rankService;

    public function __construct(RankService $rankService)
    {
        $this->rankService = $rankService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ranks = $this->rankService->getAll();

        return (new RankCollection($ranks))->additional([
            'message' => 'get all ranks success',
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRankRequest $request)
    {
        $rank = $this->rankService->createRank($request->only('code', 'name'));

        return \response()->json([
            'data' => new RankResource($rank),
            'message' => 'create rank success',
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rank = $this->rankService->getRankById($id);

        return \response()->json([
            'data' => new RankResource($rank),
            'message' => 'get rank success',
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRankRequest $request, string $id)
    {
        $rank = $this->rankService->updateRank($request->only('code', 'name'), $id);

        if ($rank) {
            return \response()->json([
                'data' => new RankResource($rank),
                'message' => 'update rank success',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'update rank fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->rankService->deleteRank($id);

        if ($result) {
            return \response()->json([
                'message' => 'delete rank success',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'delete rank error',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
